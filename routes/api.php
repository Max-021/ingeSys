<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/clientes', 'App\Http\Controller\ClienteController@index');
Route::post('/clientes', 'App\Http\Controller\ClienteController@store');
Route::put('/clientes/{id}', 'App\Http\Controller\ClienteController@update');
Route::delete('/clientes/{id}', 'App\Http\Controller\ClienteController@destroy');

Route::get('/unidades', 'App\Http\Controller\UnidadController@index');
Route::post('/unidades', 'App\Http\Controller\UnidadController@store');
Route::put('/unidades/{id}', 'App\Http\Controller\UnidadController@update');
Route::delete('/unidades/{id}', 'App\Http\Controller\UnidadController@destroy');

Route::get('/presupuestos/{instancia}', 'App\Http\Controller\PresupuestoController@all');
Route::post('/presupuestos', 'App\Http\Controller\PresupuestoController@store');
Route::put('/presupuestos/{id}', 'App\Http\Controller\PresupuestoController@update');
Route::delete('/presupuestos/{id}', 'App\Http\Controller\PresupuestoController@destroy');
