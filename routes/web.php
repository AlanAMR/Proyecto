<?php

use Illuminate\Support\Facades\Route;

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

// Rutas Login/Logout 
Auth::routes(['register' => false]);
Route::get('/ingresar','HomeController@ingresar')->name('ingresar');

// Rutas por defecto
Route::get('/', 'HomeController@index');
Route::get('/inicio', 'HomeController@index');

Route::get('/acercade', 'HomeController@acercade');
Route::get('/cotizacion', 'HomeController@cotizacion');
Route::get('/servicios', 'HomeController@servicios');
Route::get('/proyectos', 'HomeController@proyectos');

// Rutas Proyectos
//Route::get('/proyectos','ProyectosController@inicio');
//Route::get('/proyectos/ver/{id}','ProyectosController@ver');
//Route::get('/proyectos/muestra/{id}','ProyectosController@muestra');

// Rutas plantillas
Route::get('/demos','PlantillasController@inicio');
Route::get('/demos/ver',function(){return redirect('/demos');});
Route::get('/demos/ver/{id}','PlantillasController@ver');
Route::get('/demos/ver/{id}/{pagina}','PlantillasController@pagina');
//Route::get('/demos/cargarinfo','PlantillasController@cargarinfo');
//Route::get('/demos/configuracion','PlantillasController@configuracion');
//Route::post('/demos/configuracion/actualizar','PlantillasController@actualizar');

// Rutas de Administracion
	// Rutas por defecto
	Route::get('/administracion','AdminController@inicio');
	Route::get('/adminstracion/configuracion','AdminController@configuracion');

	// Rutas de Administracion de Usuarios
	Route::get('/administracion/usuarios','UsersController@index');
	Route::get('/administracion/usuarios/ver/{id}','UsersController@ver');
	Route::get('/administracion/usuarios/crear','UsersController@crear');
	Route::post('/administracion/usuarios/agregar','UsersController@agregar');
	Route::get('/administracion/usuarios/modificar','UsersController@modificar');
	Route::post('/administracion/usuarios/actualizar','UsersController@actualizar');
	Route::post('/administracion/usuarios/eliminar','UsersController@eliminar');

	// Rutas de Administracion de proyectos
	Route::get('/administracion/proyectos','AdminProyectosController@inicio');
	Route::get('/administracion/proyectos/crear','AdminProyectosController@crear');
	Route::post('/administracion/proyectos/agregar','AdminProyectosController@agregar');
	Route::get('/administracion/proyectos/modificar','AdminProyectosController@modificar');
	Route::post('/administracion/proyectos/actualizar','AdminProyectosController@actualizar');

	// Rutas de Administracion de plantillas
	Route::get('/administracion/plantillas','AdminPlantillasController@inicio');
	Route::get('/administracion/plantillas/crear','AdminPlantillasController@crear');
	Route::post('/administracion/plantillas/agregar','AdminPlantillasController@agregar');
	Route::get('/administracion/plantillas/modificar','AdminPlantillasController@modificar');
	Route::post('/administracion/plantillas/actualizar','AdminPlantillasController@actualizar');

	// Rutas de Administracion de Ingresos

	// Rutas de Administracion de Egresos

	// Rutas de Administracion de Servicios

	// Rutas de Administracion de Acuerdos Compra-Venta

	// Rutas de Administracion de Clientes

	// Rutas de Administracion de Personal




// Correos
Route::post('/enviarmail','HomeController@mail');


Route::get('/utilerias/redireccion/rol','UtileriasController@redireccionRol');

Route::get('/almacen','AlmacenController@inicio');

/*
	Rutas para la administracion de responsivas
*/
Route::get('/almacen/responsivas','ResponsivasController@inicio');
Route::get('/almacen/responsivas/ver/{id}','ResponsivasController@ver');
Route::get('/almacen/responsivas/nuevo','ResponsivasController@nuevo');
Route::post('/almacen/responsivas/crear','ResponsivasController@crear');
Route::get('/almacen/responsivas/modificar','ResponsivasController@modificar');
Route::post('/almacen/responsivas/actualizar','ResponsivasController@actualizar');
Route::post('/almacen/responsivas/eliminar','ResponsivasController@eliminar');

Route::get('/almacen/responsivas/verpdf/{id}','ResponsivasController@verpdf');
Route::get('/almacen/responsivas/descargarpdf/{id}','ResponsivasController@descargarpdf');

Route::get('/almacen/responsivas/anadirestado','ResponsivasController@anadirestado');
Route::post('/almacen/responsivas/subirarchivo','ResponsivasController@subirarchivo');
Route::post('/almacen/responsivas/eliminararchivo','ResponsivasController@eliminararchivo');



/*
	Rutas para la administracion de celulares
*/
Route::get('/almacen/celulares','CelularesController@inicio');
//Route::get('/almacen/celulares/ver/{id}','CelularesController@ver');
Route::get('/almacen/celulares/nuevo','CelularesController@nuevo');
Route::post('/almacen/celulares/crear','CelularesController@crear');
Route::get('/almacen/celulares/modificar/{id}','CelularesController@modificar');
Route::post('/almacen/celulares/actualizar','CelularesController@actualizar');
Route::post('/almacen/celulares/eliminar','CelularesController@eliminar');

/*
	Rutas para la administracion de laptops
*/
Route::get('/almacen/laptops','LaptopsController@inicio');
Route::get('/almacen/laptops/ver/{id}','LaptopsController@ver');
Route::get('/almacen/laptops/nuevo','LaptopsController@nuevo');
Route::post('/almacen/laptops/crear','LaptopsController@crear');
Route::get('/almacen/laptops/modificar/{id}','LaptopsController@modificar');
Route::post('/almacen/laptops/actualizar','LaptopsController@actualizar');
Route::post('/almacen/laptops/eliminar','LaptopsController@eliminar');

/*
	Rutas para la administracion de chips
*/
Route::get('/almacen/chips','ChipsController@inicio');
//Route::get('/almacen/chips/ver/{id}','ChipsController@ver');
Route::get('/almacen/chips/nuevo','ChipsController@nuevo');
Route::post('/almacen/chips/crear','ChipsController@crear');
Route::get('/almacen/chips/modificar/{id}','ChipsController@modificar');
Route::post('/almacen/chips/actualizar','ChipsController@actualizar');
Route::post('/almacen/chips/eliminar','ChipsController@eliminar');



Route::get('/admin/configuracion/principal','AdminController@principal');
Route::get('/admin/configuracion/correos','AdminController@correos');




// Templates
Route::get('/templates','TemplateController@index');
Route::get('/templates/{nombre}','TemplateController@vertemplate');
Route::get('/templates/{nombre}/{seccion}','TemplateController@templatepagina');
