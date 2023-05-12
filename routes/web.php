<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\IncluyeController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\ProcesotrabajoController;
use App\Http\Controllers\ProyectosController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\TiposerviciocotizarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::controller(ClienteController::class)->group(function(){
    Route::get('cliente','leerCliente')->name('cliente.traer');
    Route::get('cliente/guardar','guardarCli')->name('cliente.guardar');
    Route::post('cliente/actualizar/{pk_cliente}','actualizarCli')->name('cliente.actualizar');
});

Route::controller(IncluyeController::class)->group(function(){
    Route::get('incluye','leerIncluye')->name('incluye.traer');
    Route::get('incluye/guardar','guardarInc')->name('incluye.guardar');
    Route::post('incluye/actualizar/{pk_incluye}','actualizarInc')->name('incluye.actualizar');
});

Route::controller(CotizacionController::class)->group(function(){
    Route::get('cotizaciones','crearCotizaciones')->name('cotizaciones.traer');
    Route::get('cotizaciones/editar/{pk_cotizaciones}','verCotizaciones')->name('cotizaciones.editar');
    Route::post('cotizaciones/guardar','guardarCotizaciones')->name('cotizaciones.guardar');
    Route::get('formulario-cotizaciones','traerDatosCotizaaciones')->name('cotizaciones.formulario');
    Route::post('cotizaciones/actualizar/{pk_cotizaciones}','actualizarCotizaciones')->name('cotizaciones.actualizar');
});

Route::controller(ProcesotrabajoController::class)->group(function(){
    Route::get('procesotrabajo','leerProcesotrabajo')->name('procesotrabajoe.traer');
    Route::get('procesotrabajo/guardar','guardarPro')->name('procesotrabajo.guardar');
    Route::post('procesotrabajo/actualizar/{pk_procesotrabajo}','actualizarPro')->name('procesotrabajo.actualizar');
});

Route::controller(ProyectosController::class)->group(function(){
    Route::get('proyectos','crearProyectos')->name('proyectos.traer');
    Route::get('proyectos/guardar','guardarProyectos')->name('proyectos.guardar');
    Route::post('proyectos/actualizar/{pk_proyectos}','actualizarProyectos')->name('proyectos.actualizar');
});

Route::controller(ServiciosController::class)->group(function(){
    Route::get('servicios','leerServicio')->name('servicios.traer');
    Route::get('servicios/guardar','guardarSer')->name('servicios.guardar');
    Route::post('servicios/actualizar/{pk_servicios}','actualizarSer')->name('servicios.actualizar');
});

Route::controller(TiposerviciocotizarController::class)->group(function(){
    Route::get('tiposerviciocotizar','leerTiposer')->name('tiposerviciocotizar.traer');
    Route::get('tiposerviciocotizar/guardar','guardarTipser(')->name('tiposerviciocotizarservicios.guardar');
    Route::post('tiposerviciocotizar/actualizar/{pk_tiposerviciocotizar}','actualizarTipser')->name('tiposerviciocotizar.actualizar');
});

Route::get('/admin', [CotizacionController::class, 'crearCotizaciones'])->name('home');

Route::get('/vista', [CotizacionController::class, 'verCotizaciones'])->name('vs');
