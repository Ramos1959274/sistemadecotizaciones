<?php

namespace App\Http\Controllers;

use App\Models\tiposerviciocotizar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class TiposerviciocotizarController extends Controller
{
    function leerTiposer(){
        $tiposerviciocotizara = tiposerviciocotizar::all();
        return view('admin.home',compact('tiposerviciocotizara'));
    }

    function guardarTipser(Request $request){
        $tiposerviciocotizar = new tiposerviciocotizar();
        $tiposerviciocotizar->tiposervicio=$request->tiposervicio;
        $tiposerviciocotizar->video=$request->video;
        $tiposerviciocotizar->preguntasfre=$request->preguntasfre;
        $tiposerviciocotizar->save();
        return redirect()->route('cliente.traer');
    }

    function leerTipser(tiposerviciocotizar $pk_tiposerviciocotizar){
        return $pk_tiposerviciocotizar;
    }

    function actualizarTipser(tiposerviciocotizar $pk_tiposerviciocotizar,Request $request){
        Log::info('llega a actualizar');
        $pk_tiposerviciocotizar->tiposervicio=$request->tiposervicio;
        $pk_tiposerviciocotizar->video=$request->video;
        $pk_tiposerviciocotizar->preguntasfre=$request->preguntasfre;
        $pk_tiposerviciocotizar->save();
        return redirect()->route('cliente.traer');
    }
}
