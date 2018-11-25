<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Sale;
use App\SaleStatus;
use App\ReservationStatus;
use App\Reservation;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $pago         = SaleStatus::where('name', '=', 'Paga')->first();
        
        $confirmados  = Reservation::select('reservations.*')->where('sales.user_id', '=', Auth::user()->id)
        ->join('reservation_statuses', 'reservation_statuses.id', 'reservations.status_id')
        ->join('sales', 'sales.id', 'reservations.sale_id')
        ->get();
        //dd($confirmados);die();
        
        $reservas     = Sale::where('user_id', '=', Auth::user()->id)->where('status_id', '<>', $pago->id)->get();

        return view('sale.index', [
            'sales' => $reservas,
            'reservations' => $confirmados,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{    
            $sale = Sale::find($id);
            $sale->delete();
            return redirect()->route('sale.index')->withSuccess('Compra deletada com sucesso');
        }catch(\Exception $e){
            return back()->withWarning($e->getMessage());
        }
    }
}
