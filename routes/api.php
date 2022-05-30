<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/clientes',                                         'App\Http\Controllers\ClienteController@index');
Route::post('/clientes',                                        'App\Http\Controllers\ClienteController@store');
Route::put('/clientes/{id}',                                    'App\Http\Controllers\ClienteController@update');
Route::delete('/clientes/{id}',                                 'App\Http\Controllers\ClienteController@destroy');

Route::get('/unidades',                                         'App\Http\Controllers\UnidadController@index');
Route::post('/unidades',                                        'App\Http\Controllers\UnidadController@store');
Route::put('/unidades/{id}',                                    'App\Http\Controllers\UnidadController@update');
Route::delete('/unidades/{id}',                                 'App\Http\Controllers\UnidadController@destroy');

Route::get('/presupuestos/{instancia}',                         'App\Http\Controllers\PresupuestoController@all');
Route::post('/presupuestos',                                    'App\Http\Controllers\PresupuestoController@store');
Route::put('/presupuestos/{id}',                                'App\Http\Controllers\PresupuestoController@update');
Route::put('/presupuestos/aprobar',                           'App\Http\Controllers\PresupuestoController@cambiarInstancia');
Route::delete('/presupuestos/{id}',                             'App\Http\Controllers\PresupuestoController@destroy');
