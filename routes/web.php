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
// Route::get('/inicioSesion', [SesionController::class, 'inicioSesion'])->name('login');
// Route::post('/autentificacion', [SesionController::class, 'iniciarSesion']);
Route::get('/', function () {
    return view('index');
});

Route::post('formulario/guardarDatos', 'App\Http\Controllers\FormularioController@guardarDatos');
Route::post('mostrarInformacion', 'App\Http\Controllers\FormularioController@mostrarInformacion');
Route::post('informacionSolicitud', 'FormularioController@mostrarInformacion');
Route::get('/ciudades', 'CiudadController@getCiudadesByEstado');
// Route::get('/resultado-busqueda', 'Controller@index')->name('otraVista');
// Route::get('obtenerRadicados', 'App\Http\Controllers\FormularioController@obtenerRadicados');

// Route::post('/formulario/guardarDatos', 'FormularioController@guardarDatos')->name('formulario.guardar.datos');

