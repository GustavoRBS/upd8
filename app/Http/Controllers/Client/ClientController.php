<?php

namespace App\Http\Controllers\Client;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class ClientController extends BaseController
{

    public function showClientRegister(Request $request)
    {
        return view('client.register', ['email' => $request->user()->email, 'password' => $request->user()->password]);
    }

    public function editClientRegister($client_id)
    {
        return view('client.register', ['client_id' => $client_id]);
    }

    public function showClientConsult(Request $request)
    {
        return view('client.consult', ['email' => $request->user()->email, 'password' => $request->user()->password]);
    }    
}
