<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::view('/inicio', "index")->name('index');
Route::view('/login', "login")->name('login');
Route::view('/registro', "register")->name('register')->middleware('auth');
Route::view('/buscar-radicado', "resultado-busqueda")->name('resultado-busqueda');

Route::post('/validar-registro','App\Http\Controllers\SessionController@register')->name('validar-registro');
Route::post('/iniciar-sesion','App\Http\Controllers\SessionController@login')->name('iniciar-sesion');
Route::post('/validarCorreo', 'App\Http\Controllers\SessionController@validarCorreo');
Route::get('/logout','App\Http\Controllers\SessionController@logout');
Route::view('/gestionar-usuario', "gestionar-usuario")->middleware('auth')->name('gestionar-usuario');
Route::post('/cambiarPassword', 'App\Http\Controllers\SessionController@cambiarPassword');

Route::post('/enviarSolicitud', 'App\Http\Controllers\FormularioController@guardarDatos');
Route::post('/listarRadicados', 'App\Http\Controllers\FormularioController@listarRadicados');
Route::post('/mostrarInformacion','App\Http\Controllers\FormularioController@mostrarInformacion');
Route::post('/enviarCorreo', 'App\Http\Controllers\FormularioController@enviarCorreo');

Route::get('/lista-solicitudes', 'App\Http\Controllers\ListaSolicitudesController@mostrarTodas')->middleware('auth')->name('lista-solicitudes');
Route::get('/descripcion-solicitud', 'App\Http\Controllers\ListaSolicitudesController@mostrarDescripcionSolicitud')->middleware('auth')->name('descripcion-solicitud');
Route::post('/responderSolicitud','App\Http\Controllers\ListaSolicitudesController@responderSolicitud');
Route::post('/mostrarSolicitud','App\Http\Controllers\ListaSolicitudesController@mostrarSolicitud');
Route::get('/descargarSolicitud','App\Http\Controllers\ListaSolicitudesController@descargarSolicitud')->name('descargar-solicitud');
Route::get('/asignarSolicitud','App\Http\Controllers\ListaSolicitudesController@asignarSolicitud');
Route::get('/descargarArchivosAdjuntos','App\Http\Controllers\ListaSolicitudesController@descargarArchivosAdjuntos');
Route::view('/estadisticas', "estadisticas")->middleware('auth')->name('estadisticas');
Route::post('/mostrarEstadisticas','App\Http\Controllers\ListaSolicitudesController@mostrarEstadisticas');




