<?php

namespace App\Http\Controllers;

use App\Models\incluye;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class IncluyeController extends Controller
{
    function leerIncluye(){
        $incluyen = incluye::all();
        return view('admin.home',compact('home'));
    }

    function guardarInc(Request $request){
        $incluyen = new incluye();
        $incluyen->modincluye=$request->modincluye;
        $incluyen->save();
        return redirect()->route('incluye.traer');
    }

    function leerInc(incluye $pk_incluye){
        return $pk_incluye;
    }

    function actualizarInc(incluye $pk_incluye,Request $request){
        Log::info('llega a actualizar');
        $pk_incluye->modincluye=$request->modincluye;
        $pk_incluye->save();
        return redirect()->route('incluye.traer');
    }
}
