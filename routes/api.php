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


Route::post('accesos/encriptar', 'api\PasswordsController@encriptar');
Route::post('accesos/desencriptar', 'api\PasswordsController@desencriptar');

Route::post('accesos/procesar/correos', 'api\PasswordsController@procesar_correos');
Route::post('accesos/procesar/usuarios', 'api\PasswordsController@procesar_usuarios');
Route::post('accesos/procesar/anydesk', 'api\PasswordsController@procesar_anydesk');
Route::post('accesos/procesar/bitlocker', 'api\PasswordsController@procesar_bitlocker');
Route::post('accesos/procesar/contpaq', 'api\PasswordsController@procesar_contpaq');
Route::post('accesos/procesar/carpetas', 'api\PasswordsController@procesar_carpetas');
Route::post('accesos/procesar/carpetasusuarios', 'api\PasswordsController@procesar_carpetasusuarios');


Route::post('conexiones/procesar/smtp', 'api\ConexionesController@procesar_smtp');
Route::post('conexiones/procesar/dbms', 'api\ConexionesController@procesar_dbms');
Route::post('conexiones/procesar/vpn', 'api\ConexionesController@procesar_vpn');
Route::post('conexiones/procesar/smb', 'api\ConexionesController@procesar_smb');
Route::post('conexiones/procesar/ras', 'api\ConexionesController@procesar_ras');
Route::post('conexiones/procesar/ftp', 'api\ConexionesController@procesar_ftp');


Route::post('usuarios/procesar/dbms', 'api\UsuariosController@procesar_dbms');
Route::post('usuarios/procesar/ras', 'api\UsuariosController@procesar_ras');
Route::post('usuarios/procesar/vpn', 'api\UsuariosController@procesar_vpn');
Route::post('usuarios/procesar/ftp', 'api\UsuariosController@procesar_ftp');

Route::post('sistemas/procesar/servidores', 'api\ServidoresController@procesar_servidores');

Route::post('almacen/procesar/laptops', 'api\ServidoresController@procesar_laptops');
Route::post('almacen/procesar/celulares', 'api\ServidoresController@procesar_celulares');

Route::post('rh/procesar/bajas', 'api\EmpleadosController@procesar_bajas');