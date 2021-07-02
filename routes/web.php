<?php

use Illuminate\Support\Facades\Route;
// Rutas Login/Logout 
Auth::routes(['register' => false]);
Route::get('/ingresar','HomeController@ingresar')->name('ingresar');

// Test 
Route::get('/test','HomeController@testMiddleware')->middleware('autoriza:test');

// Rutas por defecto
Route::get('/', 'HomeController@index');
Route::get('/inicio', 'HomeController@index');

Route::get('/acercade', 'HomeController@acercade');
Route::get('/cotizacion', 'HomeController@cotizacion');
Route::get('/servicios', 'HomeController@servicios');
Route::get('/proyectos', 'HomeController@proyectos');

// Rutas plantillas
Route::get('/demos','PlantillasController@inicio');
Route::get('/demos/ver',function(){return redirect('/demos');});
Route::get('/demos/ver/{id}','PlantillasController@ver');
Route::get('/demos/ver/{id}/{pagina}','PlantillasController@pagina');

// Rutas de Administracion
	// Rutas por defecto
	Route::get('/administracion','AdminController@inicio');
	Route::get('/adminstracion/configuracion','AdminController@configuracion');

	// Rutas de Administracion de Usuarios
	Route::get('/administracion/usuarios','UsersController@index')->middleware('autoriza:Administrador');
	Route::get('/administracion/usuarios/ver/{id}','UsersController@ver')->middleware('autoriza:Administrador');
	Route::get('/administracion/usuarios/crear','UsersController@crear')->middleware('autoriza:Administrador');
	Route::post('/administracion/usuarios/agregar','UsersController@agregar')->middleware('autoriza:Administrador');
	Route::get('/administracion/usuarios/modificar/{id}','UsersController@modificar')->middleware('autoriza:Administrador');
	Route::post('/administracion/usuarios/actualizar','UsersController@actualizar')->middleware('autoriza:Administrador');
	Route::post('/administracion/usuarios/eliminar','UsersController@eliminar')->middleware('autoriza:Administrador');

	// Rutas de Administracion de Roles
	Route::get('/administracion/roles','RolesController@index')->middleware('autoriza:Administrador');
	Route::get('/administracion/roles/ver/{id}','RolesController@ver')->middleware('autoriza:Administrador');
	Route::get('/administracion/roles/nuevo','RolesController@nuevo')->middleware('autoriza:Administrador');
	Route::post('/administracion/roles/crear','RolesController@crear')->middleware('autoriza:Administrador');
	Route::get('/administracion/roles/modificar/{id}','RolesController@modificar')->middleware('autoriza:Administrador');
	Route::post('/administracion/roles/actualizar','RolesController@actualizar')->middleware('autoriza:Administrador');
	Route::post('/administracion/roles/eliminar','RolesController@eliminar')->middleware('autoriza:Administrador');

	// Rutas de Administracion de Permisos Especiales

	Route::get('/administracion/permisos','PermisosEspecialesController@inicio')->middleware('autoriza:Administrador'); 
	Route::get('/administracion/permisos/nuevo','PermisosEspecialesController@nuevo')->middleware('autoriza:Administrador');
	Route::post('/administracion/permisos/crear','PermisosEspecialesController@crear')->middleware('autoriza:Administrador');
	Route::post('/administracion/permisos/eliminar','PermisosEspecialesController@eliminar')->middleware('autoriza:Administrador');

	// Rutas de Administracion de proyectos
	Route::get('/administracion/proyectos','AdminProyectosController@inicio')->middleware('autoriza:Por_Programar');
	Route::get('/administracion/proyectos/crear','AdminProyectosController@crear')->middleware('autoriza:Por_Programar');
	Route::post('/administracion/proyectos/agregar','AdminProyectosController@agregar')->middleware('autoriza:Por_Programar');
	Route::get('/administracion/proyectos/modificar','AdminProyectosController@modificar')->middleware('autoriza:Por_Programar');
	Route::post('/administracion/proyectos/actualizar','AdminProyectosController@actualizar')->middleware('autoriza:Por_Programar');

	// Rutas de Administracion de plantillas
	Route::get('/administracion/plantillas','AdminPlantillasController@inicio')->middleware('autoriza:Por_Programar');
	Route::get('/administracion/plantillas/crear','AdminPlantillasController@crear')->middleware('autoriza:Por_Programar');
	Route::post('/administracion/plantillas/agregar','AdminPlantillasController@agregar')->middleware('autoriza:Por_Programar');
	Route::get('/administracion/plantillas/modificar','AdminPlantillasController@modificar')->middleware('autoriza:Por_Programar');
	Route::post('/administracion/plantillas/actualizar','AdminPlantillasController@actualizar')->middleware('autoriza:Por_Programar');

// Correos
Route::post('/enviarmail','HomeController@mail');


Route::get('/utilerias/redireccion/rol','UtileriasController@redireccionRol');

Route::get('/almacen','AlmacenController@inicio');

/*
	Rutas para la administracion de responsivas
*/
Route::get('/almacen/responsivas','ResponsivasController@inicio')->middleware('autoriza:Administrador');
Route::get('/almacen/responsivas/ver/{id}','ResponsivasController@ver')->middleware('autoriza:Administrador');
Route::get('/almacen/responsivas/nuevo','ResponsivasController@nuevo')->middleware('autoriza:Administrador');
Route::post('/almacen/responsivas/crear','ResponsivasController@crear')->middleware('autoriza:Administrador');
Route::get('/almacen/responsivas/modificar','ResponsivasController@modificar')->middleware('autoriza:Administrador');
Route::post('/almacen/responsivas/actualizar','ResponsivasController@actualizar')->middleware('autoriza:Administrador');
Route::post('/almacen/responsivas/eliminar','ResponsivasController@eliminar')->middleware('autoriza:Administrador');

Route::get('/almacen/responsivas/verpdf/{id}','ResponsivasController@verpdf')->middleware('autoriza:Administrador');
Route::get('/almacen/responsivas/descargarpdf/{id}','ResponsivasController@descargarpdf')->middleware('autoriza:Administrador');

Route::get('/almacen/responsivas/anadirestado','ResponsivasController@anadirestado')->middleware('autoriza:Administrador');
Route::post('/almacen/responsivas/subirarchivo','ResponsivasController@subirarchivo')->middleware('autoriza:Administrador');
Route::post('/almacen/responsivas/eliminararchivo','ResponsivasController@eliminararchivo')->middleware('autoriza:Administrador');



/*
	Rutas para la administracion de celulares
*/
Route::get('/almacen/celulares','CelularesController@inicio')->middleware('autoriza:Administrador');
Route::get('/almacen/celulares/ver/{id}','CelularesController@ver');
Route::get('/almacen/celulares/nuevo','CelularesController@nuevo')->middleware('autoriza:Administrador');
Route::post('/almacen/celulares/crear','CelularesController@crear')->middleware('autoriza:Administrador');
Route::get('/almacen/celulares/modificar/{id}','CelularesController@modificar')->middleware('autoriza:Administrador');
Route::post('/almacen/celulares/actualizar','CelularesController@actualizar')->middleware('autoriza:Administrador');
Route::post('/almacen/celulares/eliminar','CelularesController@eliminar')->middleware('autoriza:Administrador');
Route::get('/almacen/celulares/cargar_csv','CelularesController@cargar_csv')->middleware('autoriza:Administrador');
Route::get('/almacen/celulares/exportar_plantilla','CelularesController@exportar_plantilla')->middleware('autoriza:Administrador');

/*
	Rutas para la administracion de laptops
*/
Route::get('/almacen/laptops','LaptopsController@inicio')->middleware('autoriza:Administrador');
Route::get('/almacen/laptops/ver/{id}','LaptopsController@ver')->middleware('autoriza:Administrador');
Route::get('/almacen/laptops/nuevo','LaptopsController@nuevo')->middleware('autoriza:Administrador');
Route::post('/almacen/laptops/crear','LaptopsController@crear')->middleware('autoriza:Administrador');
Route::get('/almacen/laptops/modificar/{id}','LaptopsController@modificar')->middleware('autoriza:Administrador');
Route::post('/almacen/laptops/actualizar','LaptopsController@actualizar')->middleware('autoriza:Administrador');
Route::post('/almacen/laptops/eliminar','LaptopsController@eliminar')->middleware('autoriza:Administrador');
Route::get('/almacen/laptops/cargar_csv','LaptopsController@cargar_csv')->middleware('autoriza:Administrador');
Route::get('/almacen/laptops/exportar_plantilla','LaptopsController@exportar_plantilla')->middleware('autoriza:Administrador');

/*
	Rutas para la administracion de laptops
*/
Route::get('/almacen/computadoras','ComputadorasController@inicio')->middleware('autoriza:Administrador');
Route::get('/almacen/computadoras/ver/{id}','ComputadorasController@ver')->middleware('autoriza:Administrador');
Route::get('/almacen/computadoras/nuevo','ComputadorasController@nuevo')->middleware('autoriza:Administrador');
Route::post('/almacen/computadoras/crear','ComputadorasController@crear')->middleware('autoriza:Administrador');
Route::get('/almacen/computadoras/modificar/{id}','ComputadorasController@modificar')->middleware('autoriza:Administrador');
Route::post('/almacen/computadoras/actualizar','ComputadorasController@actualizar')->middleware('autoriza:Administrador');
Route::post('/almacen/computadoras/eliminar','ComputadorasController@eliminar')->middleware('autoriza:Administrador');

/*
	Rutas para la administracion de chips
*/
Route::get('/almacen/chips','ChipsController@inicio')->middleware('autoriza:Sistemas')->middleware('autoriza:Administrador');
//Route::get('/almacen/chips/ver/{id}','ChipsController@ver');
Route::get('/almacen/chips/nuevo','ChipsController@nuevo')->middleware('autoriza:Sistemas')->middleware('autoriza:Administrador');
Route::post('/almacen/chips/crear','ChipsController@crear')->middleware('autoriza:Sistemas')->middleware('autoriza:Administrador');
Route::get('/almacen/chips/modificar/{id}','ChipsController@modificar')->middleware('autoriza:Sistemas')->middleware('autoriza:Administrador');
Route::post('/almacen/chips/actualizar','ChipsController@actualizar')->middleware('autoriza:Sistemas')->middleware('autoriza:Administrador');
Route::post('/almacen/chips/eliminar','ChipsController@eliminar')->middleware('autoriza:Sistemas')->middleware('autoriza:Administrador');

Route::get('/almacen/chips/exportar_plantilla','ChipsController@exportar_plantilla')->middleware('autoriza:Sistemas')->middleware('autoriza:Administrador');
Route::get('/almacen/chips/cargar_csv','ChipsController@cargar_csv')->middleware('autoriza:Sistemas')->middleware('autoriza:Administrador');



Route::get('/administracion/configuracion/principal','AdminController@principal')->middleware('autoriza:Por_Programar');
Route::get('/administracion/configuracion/correos','AdminController@correos')->middleware('autoriza:Por_Programar');




// Templates
Route::get('/templates','TemplateController@index')->middleware('autoriza:Por_Programar');
Route::get('/templates/{nombre}','TemplateController@vertemplate')->middleware('autoriza:Por_Programar');
Route::get('/templates/{nombre}/{seccion}','TemplateController@templatepagina')->middleware('autoriza:Por_Programar');


/*
	Rutas para la administracion de empresas
*/
Route::get('/administracion/empresas','EmpresasController@inicio')->middleware('autoriza:verempresas');
Route::get('/administracion/empresas/nuevo','EmpresasController@nuevo')->middleware('autoriza:crearempresas');
Route::post('/administracion/empresas/crear','EmpresasController@crear')->middleware('autoriza:crearempresas');
Route::get('/administracion/empresas/modificar/{id}','EmpresasController@modificar')->middleware('autoriza:modificarempresas');
Route::post('/administracion/empresas/actualizar','EmpresasController@actualizar')->middleware('autoriza:modificarempresas');
Route::post('/administracion/empresas/eliminar','EmpresasController@eliminar')->middleware('autoriza:eliminarempresas');

/*
	Rutas para la administracion de sucursales
*/
Route::get('/administracion/sucursales','SucursalesController@inicio')->middleware('autoriza:versucursales');
Route::get('/administracion/sucursales/nuevo','SucursalesController@nuevo')->middleware('autoriza:crearsucursales');
Route::post('/administracion/sucursales/crear','SucursalesController@crear')->middleware('autoriza:crearsucursales');
Route::get('/administracion/sucursales/modificar/{id}','SucursalesController@modificar')->middleware('autoriza:modificarsucursales');
Route::post('/administracion/sucursales/actualizar','SucursalesController@actualizar')->middleware('autoriza:modificarsucursales');
Route::post('/administracion/sucursales/eliminar','SucursalesController@eliminar')->middleware('autoriza:eliminarsucursales');

/*
	Rutas para la administracion de Areas
*/
Route::get('/administracion/areas','AreasController@inicio')->middleware('autoriza:verareas');
Route::get('/administracion/areas/nuevo','AreasController@nuevo')->middleware('autoriza:crearareas');
Route::post('/administracion/areas/crear','AreasController@crear')->middleware('autoriza:crearareas');
Route::get('/administracion/areas/modificar/{id}','AreasController@modificar')->middleware('autoriza:modificarareas');
Route::post('/administracion/areas/actualizar','AreasController@actualizar')->middleware('autoriza:modificarareas');
Route::post('/administracion/areas/eliminar','AreasController@eliminar')->middleware('autoriza:aliminarareas');

/*
	Rutas para la administracion de Puestos
*/
Route::get('/administracion/puestos','PuestosController@inicio')->middleware('autoriza:Administrador');
Route::get('/administracion/puestos/nuevo','PuestosController@nuevo')->middleware('autoriza:Administrador');
Route::post('/administracion/puestos/crear','PuestosController@crear')->middleware('autoriza:Administrador');
Route::get('/administracion/puestos/modificar/{id}','PuestosController@modificar')->middleware('autoriza:Administrador');
Route::post('/administracion/puestos/actualizar','PuestosController@actualizar')->middleware('autoriza:Administrador');
Route::post('/administracion/puestos/eliminar','PuestosController@eliminar')->middleware('autoriza:Administrador');


/*
	Rutas para la administracion de almacenes
*/
Route::get('/administracion/almacenes','AlmacenesController@inicio')->middleware('autoriza:Administrador');
Route::get('/administracion/almacenes/nuevo','AlmacenesController@nuevo')->middleware('autoriza:Administrador');
Route::post('/administracion/almacenes/crear','AlmacenesController@crear')->middleware('autoriza:Administrador');
Route::get('/administracion/almacenes/modificar/{id}','AlmacenesController@modificar')->middleware('autoriza:Administrador');
Route::post('/administracion/almacenes/actualizar','AlmacenesController@actualizar')->middleware('autoriza:Administrador');
Route::post('/administracion/almacenes/eliminar','AlmacenesController@eliminar')->middleware('autoriza:Administrador');


/*
	Rutas para la administracion de articulos
*/
Route::get('/almacen-general/articulos','ArticulosController@inicio')->middleware('autoriza:Almacen');
Route::get('/almacen-general/articulos/nuevo','ArticulosController@nuevo')->middleware('autoriza:Almacen');
Route::post('/almacen-general/articulos/crear','ArticulosController@crear')->middleware('autoriza:Almacen');
Route::get('/almacen-general/articulos/modificar/{id}','ArticulosController@modificar')->middleware('autoriza:Almacen');
Route::post('/almacen-general/articulos/actualizar','ArticulosController@actualizar')->middleware('autoriza:Almacen');
Route::post('/almacen-general/articulos/eliminar','ArticulosController@eliminar')->middleware('autoriza:Almacen');

Route::get('/almacen-general/articulos/exportar_plantilla','ArticulosController@exportar_plantilla')->middleware('autoriza:Almacen');
Route::get('/almacen-general/articulos/cargar-csv','ArticulosController@cargar_csv')->middleware('autoriza:Almacen');

// Rutas para la administracion de Categorias

Route::get('/almacen-general/categorias','CategoriasController@inicio')->middleware('autoriza:Almacen');
Route::get('/almacen-general/categorias/nuevo','CategoriasController@nuevo')->middleware('autoriza:Almacen');
Route::post('/almacen-general/categorias/crear','CategoriasController@crear')->middleware('autoriza:Almacen');
Route::get('/almacen-general/categorias/modificar/{id}','CategoriasController@modificar')->middleware('autoriza:Almacen');
Route::post('/almacen-general/categorias/actualizar','CategoriasController@actualizar')->middleware('autoriza:Almacen');
Route::post('/almacen-general/categorias/eliminar','CategoriasController@eliminar')->middleware('autoriza:Almacen');

// Rutas para la administracion de las subcategorias

Route::get('/almacen-general/subcategorias','SubcategoriasController@inicio')->middleware('autoriza:Almacen');
Route::get('/almacen-general/subcategorias/nuevo','SubcategoriasController@nuevo')->middleware('autoriza:Almacen');
Route::post('/almacen-general/subcategorias/crear','SubcategoriasController@crear')->middleware('autoriza:Almacen');
Route::get('/almacen-general/subcategorias/modificar/{id}','SubcategoriasController@modificar')->middleware('autoriza:Almacen');
Route::post('/almacen-general/subcategorias/actualizar','SubcategoriasController@actualizar')->middleware('autoriza:Almacen');
Route::post('/almacen-general/subcategorias/eliminar','SubcategoriasController@eliminar')->middleware('autoriza:Almacen');



Route::get('/almacen-vehicular/responsivas','HomeController@inicio')->middleware('autoriza:Por_Programar');
Route::get('/almacen-vehicular/vehiculos','HomeController@inicio')->middleware('autoriza:Por_Programar');
Route::get('/almacen-general/reportes','HomeController@inicio')->middleware('autoriza:Por_Programar');
Route::get('/almacen-general/entradas','HomeController@inicio')->middleware('autoriza:Por_Programar');
Route::get('/almacen-general/salidas','HomeController@inicio')->middleware('autoriza:Por_Programar');
Route::get('/almacen-general/inventario-fisico','HomeController@inicio')->middleware('autoriza:Por_Programar');


Route::get('/administracion/contrasenias','HomeController@inicio')->middleware('autoriza:Por_Programar');
Route::get('/pruebas/encriptar','testController@encriptar');
Route::get('/pruebas/desencriptar','testController@desencriptar');


Route::get('/rh/colaboradoes','HomeController@inicio')->middleware('autoriza:Por_Programar');


/*
	Rutas para la administracion de Horarios
*/
Route::get('/rh/horarios','HorariosController@inicio')->middleware('autoriza:verhorarios');
Route::get('/rh/horarios/nuevo','HorariosController@nuevo')->middleware('autoriza:crearhorarios');
Route::post('/rh/horarios/crear','HorariosController@crear')->middleware('autoriza:crearhorarios');
Route::get('/rh/horarios/modificar/{id}','HorariosController@modificar')->middleware('autoriza:modificarhorarios');
Route::post('/rh/horarios/actualizar','HorariosController@actualizar')->middleware('autoriza:modificarhorarios');
Route::post('/rh/horarios/eliminar','HorariosController@eliminar')->middleware('autoriza:eliminarhorarios');

	
/*
	Rutas para la administracion de Empleados
*/
Route::get('/rh/empleados','EmpleadosController@inicio')->middleware('autoriza:RH');
Route::get('/rh/empleados/nuevo','EmpleadosController@nuevo')->middleware('autoriza:RH');
Route::get('/rh/empleados/ver/{id}','EmpleadosController@ver')->middleware('autoriza:RH');
Route::post('/rh/empleados/crear','EmpleadosController@crear')->middleware('autoriza:RH');
Route::get('/rh/empleados/modificar/{id}','EmpleadosController@modificar')->middleware('autoriza:RH');
Route::post('/rh/empleados/actualizar','EmpleadosController@actualizar')->middleware('autoriza:RH');



/*
	Rutas para la administracion de Contraseñas de correos electronicos
*/
Route::get('sistemas/accesos/correos','PassCorreosController@inicio')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/correos/nuevo','PassCorreosController@nuevo')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/correos/cargar_csv','PassCorreosController@cargar_csv')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/correos/exportar_plantilla','PassCorreosController@exportar_plantilla')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/correos/ver/{id}','PassCorreosController@ver')->middleware('autoriza:Administrador');
Route::post('sistemas/accesos/correos/crear','PassCorreosController@crear')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/correos/modificar/{id}','PassCorreosController@modificar')->middleware('autoriza:Administrador');
Route::post('sistemas/accesos/correos/actualizar','PassCorreosController@actualizar')->middleware('autoriza:Administrador');
Route::post('sistemas/accesos/correos/eliminar','PassCorreosController@eliminar')->middleware('autoriza:Administrador');

/*
	Rutas para la administracioin de Contraseñas de Usuarios (windows / linux /mac)
*/

Route::get('sistemas/accesos/sistemaop','PassSisOpController@inicio')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/sistemaop/nuevo','PassSisOpController@nuevo')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/sistemaop/cargar_csv','PassSisOpController@cargar_csv')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/sistemaop/exportar_plantilla','PassSisOpController@exportar_plantilla')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/sistemaop/ver/{id}','PassSisOpController@ver')->middleware('autoriza:Administrador');
Route::post('sistemas/accesos/sistemaop/crear','PassSisOpController@crear')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/sistemaop/modificar/{id}','PassSisOpController@modificar')->middleware('autoriza:Administrador');
Route::post('sistemas/accesos/sistemaop/actualizar','PassSisOpController@actualizar')->middleware('autoriza:Administrador');
Route::post('sistemas/accesos/sistemaop/eliminar','PassSisOpController@eliminar')->middleware('autoriza:Administrador');

/*
	Rutas para la administracioin de Contraseñas de Any Desk
*/

Route::get('sistemas/accesos/anydesk','PassAnyDeskController@inicio')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/anydesk/nuevo','PassAnyDeskController@nuevo')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/anydesk/cargar_csv','PassAnyDeskController@cargar_csv')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/anydesk/exportar_plantilla','PassAnyDeskController@exportar_plantilla')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/anydesk/ver/{id}','PassAnyDeskController@ver')->middleware('autoriza:Administrador');
Route::post('sistemas/accesos/anydesk/crear','PassAnyDeskController@crear')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/anydesk/modificar/{id}','PassAnyDeskController@modificar')->middleware('autoriza:Administrador');
Route::post('sistemas/accesos/anydesk/actualizar','PassAnyDeskController@actualizar')->middleware('autoriza:Administrador');
Route::post('sistemas/accesos/anydesk/eliminar','PassAnyDeskController@eliminar')->middleware('autoriza:Administrador');


/*
	Rutas para la administracion de claves de Bitlocker
*/

Route::get('sistemas/accesos/bitlocker','PassBitlockerController@inicio')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/bitlocker/nuevo','PassBitlockerController@nuevo')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/bitlocker/cargar_csv','PassBitlockerController@cargar_csv')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/bitlocker/exportar_plantilla','PassBitlockerController@exportar_plantilla')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/bitlocker/ver/{id}','PassBitlockerController@ver')->middleware('autoriza:Administrador');
Route::post('sistemas/accesos/bitlocker/crear','PassBitlockerController@crear')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/bitlocker/modificar/{id}','PassBitlockerController@modificar')->middleware('autoriza:Administrador');
Route::post('sistemas/accesos/bitlocker/actualizar','PassBitlockerController@actualizar')->middleware('autoriza:Administrador');
Route::post('sistemas/accesos/bitlocker/eliminar','PassBitlockerController@eliminar')->middleware('autoriza:Administrador');


/*
	Rutas para la administracion de usuarios de Contpaq
*/

Route::get('sistemas/accesos/contpaq','PassContpaqController@inicio')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/contpaq/nuevo','PassContpaqController@nuevo')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/contpaq/cargar_csv','PassContpaqController@cargar_csv')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/contpaq/exportar_plantilla','PassContpaqController@exportar_plantilla')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/contpaq/ver/{id}','PassContpaqController@ver')->middleware('autoriza:Administrador');
Route::post('sistemas/accesos/contpaq/crear','PassContpaqController@crear')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/contpaq/modificar/{id}','PassContpaqController@modificar')->middleware('autoriza:Administrador');
Route::post('sistemas/accesos/contpaq/actualizar','PassContpaqController@actualizar')->middleware('autoriza:Administrador');
Route::post('sistemas/accesos/contpaq/eliminar','PassContpaqController@eliminar')->middleware('autoriza:Administrador');

/*
	Rutas para la administracion de usuarios de conexion DBMS
*/

Route::get('sistemas/accesos/dbms','AccesosDBMSController@inicio')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/dbms/nuevo','AccesosDBMSController@nuevo')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/dbms/cargar_csv','AccesosDBMSController@cargar_csv')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/dbms/exportar_plantilla','AccesosDBMSController@exportar_plantilla')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/dbms/ver/{id}','AccesosDBMSController@ver')->middleware('autoriza:Administrador');
Route::post('sistemas/accesos/dbms/crear','AccesosDBMSController@crear')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/dbms/modificar/{id}','AccesosDBMSController@modificar')->middleware('autoriza:Administrador');
Route::post('sistemas/accesos/dbms/actualizar','AccesosDBMSController@actualizar')->middleware('autoriza:Administrador');
Route::post('sistemas/accesos/dbms/eliminar','AccesosDBMSController@eliminar')->middleware('autoriza:Administrador');

/*
	Rutas para la administracion de usuarios de conexion RAS / RDP
*/

Route::get('sistemas/accesos/ras','AccesosRASController@inicio')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/ras/nuevo','AccesosRASController@nuevo')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/ras/cargar_csv','AccesosRASController@cargar_csv')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/ras/exportar_plantilla','AccesosRASController@exportar_plantilla')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/ras/ver/{id}','AccesosRASController@ver')->middleware('autoriza:Administrador');
Route::post('sistemas/accesos/ras/crear','AccesosRASController@crear')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/ras/modificar/{id}','AccesosRASController@modificar')->middleware('autoriza:Administrador');
Route::post('sistemas/accesos/ras/actualizar','AccesosRASController@actualizar')->middleware('autoriza:Administrador');
Route::post('sistemas/accesos/ras/eliminar','AccesosRASController@eliminar')->middleware('autoriza:Administrador');

/*
	Rutas para la administracion de usuarios de conexion VPN
*/

Route::get('sistemas/accesos/vpn','AccesosVPNController@inicio')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/vpn/nuevo','AccesosVPNController@nuevo')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/vpn/cargar_csv','AccesosVPNController@cargar_csv')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/vpn/exportar_plantilla','AccesosVPNController@exportar_plantilla')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/vpn/ver/{id}','AccesosVPNController@ver')->middleware('autoriza:Administrador');
Route::post('sistemas/accesos/vpn/crear','AccesosVPNController@crear')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/vpn/modificar/{id}','AccesosVPNController@modificar')->middleware('autoriza:Administrador');
Route::post('sistemas/accesos/vpn/actualizar','AccesosVPNController@actualizar')->middleware('autoriza:Administrador');
Route::post('sistemas/accesos/vpn/eliminar','AccesosVPNController@eliminar')->middleware('autoriza:Administrador');

/*
	Rutas para la administracion de usuarios de conexion FTP
*/

Route::get('sistemas/accesos/ftp','AccesosFTPController@inicio')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/ftp/nuevo','AccesosFTPController@nuevo')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/ftp/cargar_csv','AccesosFTPController@cargar_csv')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/ftp/exportar_plantilla','AccesosFTPController@exportar_plantilla')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/ftp/ver/{id}','AccesosFTPController@ver')->middleware('autoriza:Administrador');
Route::post('sistemas/accesos/ftp/crear','AccesosFTPController@crear')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/ftp/modificar/{id}','AccesosFTPController@modificar')->middleware('autoriza:Administrador');
Route::post('sistemas/accesos/ftp/actualizar','AccesosFTPController@actualizar')->middleware('autoriza:Administrador');
Route::post('sistemas/accesos/ftp/eliminar','AccesosFTPController@eliminar')->middleware('autoriza:Administrador');

/*
	Rutas para la administracion de usuarios de carpetas compartidas
*/

Route::get('sistemas/accesos/carpetas','AccesosSMBController@inicio')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/carpetas/nuevo','AccesosSMBController@nuevo')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/carpetas/cargar_csv','AccesosSMBController@cargar_csv')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/carpetas/exportar_plantilla','AccesosSMBController@exportar_plantilla')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/carpetas/exportar_plantilla_usuarios','AccesosSMBController@exportar_plantilla_usuarios')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/carpetas/ver/{id}','AccesosSMBController@ver')->middleware('autoriza:Administrador');
Route::post('sistemas/accesos/carpetas/crear','AccesosSMBController@crear')->middleware('autoriza:Administrador');
Route::get('sistemas/accesos/carpetas/modificar/{id}','AccesosSMBController@modificar')->middleware('autoriza:Administrador');
Route::post('sistemas/accesos/carpetas/actualizar','AccesosSMBController@actualizar')->middleware('autoriza:Administrador');
Route::post('sistemas/accesos/carpetas/eliminar','AccesosSMBController@eliminar')->middleware('autoriza:Administrador');


/*
	Rutas para la administracion de conexiones SMTP 
*/

Route::get('sistemas/conexiones/smtp','ConexionesSMTPController@inicio')->middleware('autoriza:Administrador');
Route::get('sistemas/conexiones/smtp/nuevo','ConexionesSMTPController@nuevo')->middleware('autoriza:Administrador');
Route::get('sistemas/conexiones/smtp/cargar_csv','ConexionesSMTPController@cargar_csv')->middleware('autoriza:Administrador');
Route::get('sistemas/conexiones/smtp/exportar_plantilla','ConexionesSMTPController@exportar_plantilla')->middleware('autoriza:Administrador');
Route::get('sistemas/conexiones/smtp/ver/{id}','ConexionesSMTPController@ver')->middleware('autoriza:Administrador');
Route::post('sistemas/conexiones/smtp/crear','ConexionesSMTPController@crear')->middleware('autoriza:Administrador');
Route::get('sistemas/conexiones/smtp/modificar/{id}','ConexionesSMTPController@modificar')->middleware('autoriza:Administrador');
Route::post('sistemas/conexiones/smtp/actualizar','ConexionesSMTPController@actualizar')->middleware('autoriza:Administrador');
Route::post('sistemas/conexiones/smtp/eliminar','ConexionesSMTPController@eliminar')->middleware('autoriza:Administrador');

/*
	Rutas para la administracion de conexiones DBMS
*/

Route::get('sistemas/conexiones/dbms','ConexionesDBMSController@inicio')->middleware('autoriza:Administrador');
Route::get('sistemas/conexiones/dbms/nuevo','ConexionesDBMSController@nuevo')->middleware('autoriza:Administrador');
Route::get('sistemas/conexiones/dbms/cargar_csv','ConexionesDBMSController@cargar_csv')->middleware('autoriza:Administrador');
Route::get('sistemas/conexiones/dbms/exportar_plantilla','ConexionesDBMSController@exportar_plantilla')->middleware('autoriza:Administrador');
Route::get('sistemas/conexiones/dbms/ver/{id}','ConexionesDBMSController@ver')->middleware('autoriza:Administrador');
Route::post('sistemas/conexiones/dbms/crear','ConexionesDBMSController@crear')->middleware('autoriza:Administrador');
Route::get('sistemas/conexiones/dbms/modificar/{id}','ConexionesDBMSController@modificar')->middleware('autoriza:Administrador');
Route::post('sistemas/conexiones/dbms/actualizar','ConexionesDBMSController@actualizar')->middleware('autoriza:Administrador');
Route::post('sistemas/conexiones/dbms/eliminar','ConexionesDBMSController@eliminar')->middleware('autoriza:Administrador');


/*
	Rutas para la administracion de conexiones VPN
*/

Route::get('sistemas/conexiones/vpn','ConexionesVPNController@inicio')->middleware('autoriza:Administrador');
Route::get('sistemas/conexiones/vpn/nuevo','ConexionesVPNController@nuevo')->middleware('autoriza:Administrador');
Route::get('sistemas/conexiones/vpn/cargar_csv','ConexionesVPNController@cargar_csv')->middleware('autoriza:Administrador');
Route::get('sistemas/conexiones/vpn/exportar_plantilla','ConexionesVPNController@exportar_plantilla')->middleware('autoriza:Administrador');
Route::get('sistemas/conexiones/vpn/ver/{id}','ConexionesVPNController@ver')->middleware('autoriza:Administrador');
Route::post('sistemas/conexiones/vpn/crear','ConexionesVPNController@crear')->middleware('autoriza:Administrador');
Route::get('sistemas/conexiones/vpn/modificar/{id}','ConexionesVPNController@modificar')->middleware('autoriza:Administrador');
Route::post('sistemas/conexiones/vpn/actualizar','ConexionesVPNController@actualizar')->middleware('autoriza:Administrador');
Route::post('sistemas/conexiones/vpn/eliminar','ConexionesVPNController@eliminar')->middleware('autoriza:Administrador');

/*
	Rutas para la administracion de conexiones SMB
*/

Route::get('sistemas/conexiones/smb','ConexionesSMBController@inicio')->middleware('autoriza:Administrador');
Route::get('sistemas/conexiones/smb/nuevo','ConexionesSMBController@nuevo')->middleware('autoriza:Administrador');
Route::get('sistemas/conexiones/smb/cargar_csv','ConexionesSMBController@cargar_csv')->middleware('autoriza:Administrador');
Route::get('sistemas/conexiones/smb/exportar_plantilla','ConexionesSMBController@exportar_plantilla')->middleware('autoriza:Administrador');
Route::get('sistemas/conexiones/smb/ver/{id}','ConexionesSMBController@ver')->middleware('autoriza:Administrador');
Route::post('sistemas/conexiones/smb/crear','ConexionesSMBController@crear')->middleware('autoriza:Administrador');
Route::get('sistemas/conexiones/smb/modificar/{id}','ConexionesSMBController@modificar')->middleware('autoriza:Administrador');
Route::post('sistemas/conexiones/smb/actualizar','ConexionesSMBController@actualizar')->middleware('autoriza:Administrador');
Route::post('sistemas/conexiones/smb/eliminar','ConexionesSMBController@eliminar')->middleware('autoriza:Administrador');


/*
	Rutas para la administracion de conexiones RAS RDP
*/

Route::get('sistemas/conexiones/ras','ConexionesRASController@inicio')->middleware('autoriza:Administrador');
Route::get('sistemas/conexiones/ras/nuevo','ConexionesRASController@nuevo')->middleware('autoriza:Administrador');
Route::get('sistemas/conexiones/ras/cargar_csv','ConexionesRASController@cargar_csv')->middleware('autoriza:Administrador');
Route::get('sistemas/conexiones/ras/exportar_plantilla','ConexionesRASController@exportar_plantilla')->middleware('autoriza:Administrador');
Route::get('sistemas/conexiones/ras/ver/{id}','ConexionesRASController@ver')->middleware('autoriza:Administrador');
Route::post('sistemas/conexiones/ras/crear','ConexionesRASController@crear')->middleware('autoriza:Administrador');
Route::get('sistemas/conexiones/ras/modificar/{id}','ConexionesRASController@modificar')->middleware('autoriza:Administrador');
Route::post('sistemas/conexiones/ras/actualizar','ConexionesRASController@actualizar')->middleware('autoriza:Administrador');
Route::post('sistemas/conexiones/ras/eliminar','ConexionesRASController@eliminar')->middleware('autoriza:Administrador');

/*
	Rutas para la administracion de conexiones FTP
*/

Route::get('sistemas/conexiones/ftp','ConexionesFTPController@inicio')->middleware('autoriza:Administrador');
Route::get('sistemas/conexiones/ftp/nuevo','ConexionesFTPController@nuevo')->middleware('autoriza:Administrador');
Route::get('sistemas/conexiones/ftp/cargar_csv','ConexionesFTPController@cargar_csv')->middleware('autoriza:Administrador');
Route::get('sistemas/conexiones/ftp/exportar_plantilla','ConexionesFTPController@exportar_plantilla')->middleware('autoriza:Administrador');
Route::get('sistemas/conexiones/ftp/ver/{id}','ConexionesFTPController@ver')->middleware('autoriza:Administrador');
Route::post('sistemas/conexiones/ftp/crear','ConexionesFTPController@crear')->middleware('autoriza:Administrador');
Route::get('sistemas/conexiones/ftp/modificar/{id}','ConexionesFTPController@modificar')->middleware('autoriza:Administrador');
Route::post('sistemas/conexiones/ftp/actualizar','ConexionesFTPController@actualizar')->middleware('autoriza:Administrador');
Route::post('sistemas/conexiones/ftp/eliminar','ConexionesFTPController@eliminar')->middleware('autoriza:Administrador');

/*
	Rutas para la administracion de Servidores 
*/

Route::get('sistemas/servidores','ServidoresController@inicio')->middleware('autoriza:Administrador');
Route::get('sistemas/servidores/nuevo','ServidoresController@nuevo')->middleware('autoriza:Administrador');
Route::get('sistemas/servidores/cargar_csv','ServidoresController@cargar_csv')->middleware('autoriza:Administrador');
Route::get('sistemas/servidores/exportar_plantilla','ServidoresController@exportar_plantilla')->middleware('autoriza:Administrador');
Route::get('sistemas/servidores/ver/{id}','ServidoresController@ver')->middleware('autoriza:Administrador');
Route::post('sistemas/servidores/crear','ServidoresController@crear')->middleware('autoriza:Administrador');
Route::get('sistemas/servidores/modificar/{id}','ServidoresController@modificar')->middleware('autoriza:Administrador');
Route::post('sistemas/servidores/actualizar','ServidoresController@actualizar')->middleware('autoriza:Administrador');
Route::post('sistemas/servidores/eliminar','ServidoresController@eliminar')->middleware('autoriza:Administrador');


Route::get('rh/bajas','HistoricoBajasController@index')->middleware('autoriza:Administrador');
Route::get('rh/bajas/cargar_csv','HistoricoBajasController@cargar_csv')->middleware('autoriza:Administrador');

Route::get('rh/bajas/nuevo','HistoricoBajasController@nuevo')->middleware('autoriza:Administrador');
Route::post('rh/bajas/crear','HistoricoBajasController@crear')->middleware('autoriza:Administrador');
Route::get('rh/bajas/ver/{id}','HistoricoBajasController@ver')->middleware('autoriza:Administrador');
Route::post('rh/bajas/eliminar','HistoricoBajasController@eliminar')->middleware('autoriza:Administrador');