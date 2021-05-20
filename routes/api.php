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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('getsubcategorias/{categoria}', 'api\ArticulosController@getsubcategorias');

Route::post('articulos/cargar_csv', 'api\ArticulosController@cargar_csv');
Route::get('articulos/procesar_csv', 'api\ArticulosController@procesar_csv');

Route::post('almacen/chips/cargar_csv', 'api\ChipsController@cargar_csv');
Route::get('almacen/chips/procesar_csv', 'api\ChipsController@procesar_csv');