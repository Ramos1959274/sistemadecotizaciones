<?php

namespace App\Http\Controllers;

use App\Models\cotizaciones;
use App\Models\procesotrabajo;
use App\Models\proyectos;
use App\Models\tiposerviciocotizar;
use App\Models\cliente;
use App\Models\servicios;
use App\Models\incluye;
use Illuminate\Http\Request;

class CotizacionController extends Controller
{
    function crearCotizaciones(){
        $cotizacion = cotizaciones::select('pk_cotizacion','fk_tiposerviciocotizar','fk_cliente','fechadecot','lugardeex','tipodeent','cotizaciones.estatus')
        ->join('tiposerviciocotizar as ti','ti.pk_tiposerviciocotizar','=','cotizaciones.fk_tiposerviciocotizar')
        ->join('cliente as cl','cl.pk_cliente','=','cotizaciones.fk_cliente')
        ->get();
        $tiposerviciocotizara = tiposerviciocotizar::select('*')->get();        
        $clientes = cliente::select('*')->get();
        return view('admin.home',compact('cotizacion', 'clientes'))
        ->with(compact('tiposerviciocotizara'));
    }

    function verCotizaciones(){
        $cotizacion = cotizaciones::select('pk_cotizacion','fk_tiposerviciocotizar','fk_cliente','fechadecot','lugardeex','tipodeent','cotizaciones.estatus')
        ->join('tiposerviciocotizar as ti','ti.pk_tiposerviciocotizar','=','cotizaciones.fk_tiposerviciocotizar')
        ->join('cliente as cl','cl.pk_cliente','=','cotizaciones.fk_cliente')
        ->get();
        $tiposerviciocotizara = tiposerviciocotizar::select('*')->get();        
        $clientes = cliente::select('*')->get();
        $incluye = incluye::select('*')->get();
        $servicios = servicios::select('*')->get();
        $procesotrabajo = procesotrabajo::select('*')->get();
        $proyecto = proyectos::select('*')->get();
        return view('vista',compact('cotizacion'))
        ->with(compact('clientes'))
        ->with(compact('tiposerviciocotizara'))
        ->with(compact('incluye'))
        ->with(compact('procesotrabajo'))
        ->with(compact('proyecto'))
        ->with(compact('servicios'));
    }

    function guardarCotizaciones(Request $req){
        $cliente = new cliente();
        $cliente->ncliente=$req->data["ncliente"];
        $cliente->save();
        $cotizaciones=new cotizaciones();
        $cotizaciones->fechadecot=$req->data["fechadecot"];
        $cotizaciones->lugardeex=$req->data["lugardeex"];
        $cotizaciones->tipodeent=$req->data["tipodeent"];
        $cotizaciones->fk_tiposerviciocotizar=$req->data["tiposerviciocotizar"];
        $tiposerviciocotizar_state = cotizaciones::select('*')->where('fk_tiposerviciocotizar',$req->data["tiposerviciocotizar"]);
        $cotizaciones->fk_cliente=$cliente->pk_cliente;
        $cliente_state = cotizaciones::select('*')->where('fk_cliente',$cliente->pk_cliente);
        $cotizaciones->save();
        
        for ($i=0; $i <count($req->data["servicios"]); $i++) { 
            $servicios = new servicios();
            $servicios->servicio=$req->data["servicios"][$i]["name"];
            $servicios->preservicio=$req->data["servicios"][$i]["precio"];
            $servicios->descuento=$req->data["descuentos"][$i]["des"];
            $servicios->cantdescu=$req->data["descuentos"][$i]["cantida"];
            $servicios->total=$req->data["total"];
            $servicios->fk_cotizaciones=$cotizaciones->pk_cotizacion;
            $servicios->save();
        }
        
        $servicios_state = servicios::select('*')->where('fk_cotizaciones',$cotizaciones->pk_cotizacion)->get();
        for ($i=0; $i <count($req->data["incluye"]); $i++) { 
            $incluye = new incluye();
            $incluye->modincluye=$req->data["incluye"][$i]["incluye"];
            $incluye->fk_cotizaciones=$cotizaciones->pk_cotizacion;
            $incluye->save();
            
        }
        $incluye_state = incluye::select('*')->where('fk_cotizaciones',$cotizaciones->pk_cotizacion)->get();
        return redirect()->route('cotizaciones.editar')
        ->with(compact('tiposerviciocotizar_state', 'cliente_state', 'servicios_state', 'incluye_state'));
    }

    public function traerDatosCotizaaciones(){
        $tiposerviciocotizara = tiposerviciocotizar::select('*')->get();
        $cliente = cliente::select('*')->get();
        $servicios = servicios::select('*')->get();
        $incluye = incluye::select('*')->get();
        return view('admin.home', compact('tiposerviciocotizar', 'cliente', 'servicios', 'incluye'));
        
    }

    function actualizarCotizaciones(cotizaciones $pk_cotizaciones,Request $req){
        $pk_cotizaciones->fk_tiposerviciocotizar=$req->fk_tiposerviciocotizar;
        $pk_cotizaciones->fk_cliente=$req->fk_cliente;
        $pk_cotizaciones->fechadecot=$req->fechadecot;
        $pk_cotizaciones->lugardeex=$req->lugardeex;
        $pk_cotizaciones->tipodeent=$req->tipodeent;
        $pk_cotizaciones->fk_servicios=$req->servicios;
        $pk_cotizaciones->fk_incluye=$req->incluye;
        $pk_cotizaciones->save();
        return redirect()->route('cotizaciones.traer');
    }
}
