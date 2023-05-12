<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ClienteController extends Controller
{
    function leerCliente(){
        $clientes = cliente::all();
        return view('admin.home',compact('home'));
    }

    function guardarCli(Request $request){
        $clientes = new cliente();
        $clientes->ncliente=$request->ncliente;
        $clientes->save();
        return redirect()->route('cliente.traer');
    }

    function leerCli(cliente $pk_cliente){
        return $pk_cliente;
    }

    function actualizarCli(cliente $pk_cliente,Request $request){
        Log::info('llega a actualizar');
        $pk_cliente->ncliente=$request->ncliente;
        $pk_cliente->save();
        return redirect()->route('cliente.traer');
    }
}
