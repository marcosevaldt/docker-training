<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Product;
use App\Sale;
use App\SaleStatus;
use App\Message;
use App\MessageStatus;
use App\Reservation;
use App\ReservationStatus;
use PagSeguro;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home', [
            'products' => Product::all(),
        ]);
    }

    public function create(Request $request, $id)
    {
        return view('home.create', [
            'product' => Product::find($id),
        ]);
    }

    public function store(Request $request)
    {

        try{
            
            $product            = Product::find($request->product_id);
            
            $pagseguro = PagSeguro::setReference($product->name)
            ->setSenderInfo([
               'senderName'  => Auth::user()->name,
               'senderPhone' => Auth::user()->phone,
               'senderEmail' => Auth::user()->email,
               'senderHash'  => $request->senderHash,
               'senderCPF'   => Auth::user()->document,
            ])
             ->setItems([
              [
                'itemId'          => $product->id,
                'itemDescription' => $product->description,
                'itemAmount'      => $product->price,
                'itemQuantity'    => '1',
              ]
            ])
            ->send([
              'paymentMethod' => 'boleto'
            ]);
            
            $sale               = new Sale;
            $sale->product_id   = $request->product_id;
            $sale->user_id      = Auth::user()->id;
            $sale->status_id    = $pagseguro->status;
            $sale->code         = $pagseguro->code;
            $sale->payment_link = $pagseguro->paymentLink;
            $sale->gross_amount = $pagseguro->grossAmount;
            $sale->date         = $request->date;
            $sale->save();

        }catch(\Artistas\PagSeguro\PagSeguroException $e) {
            Log::error($e->getCode() . ': ' . $e->getMessage());
            return back()->withWarning($e->getMessage());
        }
        return redirect()->route('sale.index')->withSuccess('Boleto emitido com sucesso!!');
    }

    public function verifyStatus(Request $request, $code, $id)
    {       
        try{
            $sale        = Sale::find($id);
            $credentials = 'email=marcosevaldt@gmail.com&token=53835DDF53754885A7B4824C42811248';
            $curl        = curl_init("https://ws.sandbox.pagseguro.uol.com.br/v3/transactions/$code?$credentials");
            curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
            curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
            $xml         = simplexml_load_string(curl_exec($curl));
            curl_close($curl);

            if($xml->status !== $sale->status->id)
            {
                $sale->status_id = $xml->status;
                $sale->update();

                $user_admin     = User::find(1);
                $status         = SaleStatus::find($xml->status);
                $message_status = MessageStatus::where('name', '=', 'Não Visualizado')->first();

                $msg            = 'Status da compra ' . $sale->code .  ' atualizada para ' . $status->name;
                $message              = new Message;
                $message->from        = $user_admin->id;
                $message->to          = $sale->user_id;
                $message->description = $msg;
                $message->status_id   = $message_status->id;
                $message->save();

                if($status->name == 'Paga')
                {
                    $reservation_status = ReservationStatus::where('name', '=', 'Reservado')->first();
                    $reservation = new Reservation;
                    $reservation->sale_id   = $sale->id;
                    $reservation->status_id = $reservation_status->id;
                    $reservation->save();

                    $msg                  = 'Reserva confirmada após pagamento da compra ' . $sale->code;
                    $message              = new Message;
                    $message->from        = $user_admin->id;
                    $message->to          = $sale->user_id;
                    $message->description = $msg;
                    $message->status_id   = $message_status->id;
                    $message->save();
                }
            }
            
        } catch(\Exception $e) {
            return back()->withWarning($e->getMessage());
        }

        return redirect()->route('sale.index')->withSuccess('Compra atualizada com sucesso!!!');
    }
}
