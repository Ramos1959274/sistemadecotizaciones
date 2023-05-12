<?php

namespace App\Http\Controllers;

use App\Models\servicios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ServiciosController extends Controller
{
    function leerServicio(){
        $servicios = servicios::all();
        return view('admin.home',compact('home'));
    }

    function guardarSer(Request $request){
        $servicios = new servicios();
        $servicios->servicio=$request->servicio;
        $servicios->preservicio=$request->preservicio;
        $servicios->descuento=$request->descuento;
        $servicios->cantdescu=$request->cantdescu;
        $servicios->total=$request->total;
        $servicios->save();
        return redirect()->route('servicios.traer');
    }

    function leerSer(servicios $pk_servicio){
        return $pk_servicio;
    }

    function actualizarSer(servicios $pk_servicios,Request $request){
        Log::info('llega a actualizar');
        $pk_servicios->servicio=$request->servicio;
        $pk_servicios->preservicio=$request->preservicio;
        $pk_servicios->descuento=$request->descuento;
        $pk_servicios->cantdescu=$request->cantdescu;
        $pk_servicios->total=$request->total;
        $pk_servicios->save();
        return redirect()->route('cliente.traer');
    }
}
