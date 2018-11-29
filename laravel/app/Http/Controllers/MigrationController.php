<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\User;
use App\Role;

class MigrationController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('migration.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $client    = new \GuzzleHttp\Client();
        $response  = $client->request('GET', 'http://node-clients:5000/clients/list');
        $body      = $response->getBody();
        $content   = $body->getContents();
        $clients   = json_decode($content,TRUE);

        try{
            
            $role_user  = Role::where('name', 'user')->first();
            $counter    = 0;
            foreach($clients as $client)
            {
                if(!User::where('email', '=', $client['email'])->exists())
                {
                    $user           = new User();
                    $user->name     = $client['name'];
                    $user->email    = $client['email'];
                    $user->password = bcrypt($client['password']);
                    $user->phone    = $client['phone'];
                    $user->document = $client['document'];
                    $user->save();
                    $user->roles()->attach($role_user);
                    $counter++;
                }
            }

            $msg = $counter == 0 ? 
            'Nenhum novo usuário, sistema está atualizado.' : 
             $counter . ' novos usuários criados.';

        }catch(\Exception $e){
            return back()->withWarning($e->getMessage());
        }

        return redirect()->route('migration.index')->withSuccess($msg);
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
        //
    }

    public function migrate()
    {
        $client   = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://node.clients:5000/clients/list');
        $body     = $response->getBody();
        $content  = $body->getContents();
        $arr      = json_decode($content,TRUE);
    }
}
