<?php

namespace App\Http\Controllers;

use App\Models\procesotrabajo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProcesotrabajoController extends Controller
{
    function leerProcesotrabajo(){
        $procesotrabajo = procesotrabajo::all();
        return view('admin.home',compact('home'));
    }

    function guardarPro(Request $request){
        $procesotrabajo = new procesotrabajo();
        $procesotrabajo->protrab=$request->protrab;
        $procesotrabajo->save();
        return redirect()->route('procesotrabajo.traer');
    }

    function leerPro(procesotrabajo $pk_procesotrabajo){
        return $pk_procesotrabajo;
    }
    function actualizarPro(procesotrabajo $pk_procesotrabajo,Request $request){
        Log::info('llega a actualizar');
        $pk_procesotrabajo->protrab=$request->protrab;
        $pk_procesotrabajo->save();
        return redirect()->route('procesotrabajo.traer');
    }
}
