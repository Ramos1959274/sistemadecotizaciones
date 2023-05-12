<?php

namespace App\Http\Controllers;

use App\Models\proyectos;
use App\Models\tiposerviciocotizar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProyectosController extends Controller
{
    function crearProyectos(){
        $proyectos = proyectos::select('pk_proyectos','nproyecto','descripcion','url','fk_tiposerviciocotizar','puesto.estatus')
        ->join('tiposerviciocotizar as ti','ti.pk_tiposerviciocotizar','=','proyectos.fk_tiposerviciocotizar')
        ->get();
        $tiposerviciocotizar = tiposerviciocotizar::select('*')
        ->whereNotIn('pk_tiposerviciocotizar',proyectos::select('fk_tiposerviciocotizar')->get())->get();
        return view('admin.home',compact('proyectos'))
        ->with(compact('proyectos'))
        ->with(compact('tiposerviciocotizar'));
    }

    function verProyectos(proyectos $pk_proyectos){
        $tiposerviciocotizar = tiposerviciocotizar::select('tiposerviciocotizar.pk_tiposerviciocotizar','tiposerviciocotizar.tiposervicio')
        ->join('proyectos','tiposerviciocotizar.pk_tiposerviciocotizar','=','proyectos.fk_tiposerviciocotizar')->get();
        return response()->json(array('datos'=>[$pk_proyectos,$tiposerviciocotizar]),200);
    }

    function guardarProyectos(Request $req){
        $proyectos=new proyectos();
        $proyectos->nproyecto=$req->nproyecto;
        $proyectos->descripcion=$req->descripcion;
        $proyectos->url=$req->urln;
        $proyectos->fk_tiposerviciocotizar=$req->tiposerviciocotizar;
        $tiposerviciocotizar_state = proyectos::select('*')->where('fk_tiposerviciocotizar',$req->tiposerviciocotizar);
        if(count($tiposerviciocotizar_state)>0){
            return redirect()->route('proyectos.traer');
        }else{
            $proyectos->save();
        }
        return redirect()->route('proyectos.traer');
    }

    function actualizarProyectos(proyectos $pk_proyectos,Request $req){
        $pk_proyectos->nproyecto=$req->nproyecto;
        $pk_proyectos->descripcion=$req->descripcion;
        $pk_proyectos->url=$req->url;
        $pk_proyectos->fk_tiposerviciocotizar=$req->tiposerviciocotizar;
        $pk_proyectos->save();
        return redirect()->route('proyectos.traer');
    }
}
