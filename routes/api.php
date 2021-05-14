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

Route::get('getlaptops', 'api\insumosController@laptops');
Route::get('getcelulares', 'api\insumosController@celulares');
Route::get('getchips', 'api\insumosController@chips');
Route::get('getall', 'api\insumosController@all');