<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Almacenes;
use App\Sucursales;


class AlmacenesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function inicio(){
    	
    	$almacenes = Almacenes::
    		select('almacenes.*','sucursales.nombre as sucursal')
    		->join('sucursales','sucursales.id','=','almacenes.sucursal_id')
    		->where('almacenes.status','!=','0')
    		->get();
    	
    	return view('admin.almacenes.index')
    		->with('almacenes',$almacenes)
    		->with('titulo','Gestion de Almacenes')
    	;
    }

    public function nuevo(){

    	$sucursales = Sucursales::all();

    	return view('admin.almacenes.nuevo')
    		->with('sucursales',$sucursales)
    		->with('titulo','Añadir un nuevo almacen')
    	; 
    }

    public function crear(Request $request){
    	
    	$validate = $request->validate([
    		'sucursal' => 'required',
    		'nombre' => 'required',
    		'ubicacion' => 'required'
    	]);

    	$almacen = new Almacenes();

    	$almacen->sucursal_id = $request->sucursal;
    	$almacen->nombre = $request->nombre;
    	$almacen->ubicacion = $request->ubicacion;

    	$almacen->save();

    	return redirect('/administracion/almacenes')
            ->with('success','Se añadio el almacen: '.$almacen->nombre);

    }

    public function modificar($id){

    	$almacen = Almacenes::findOrFail($id);
    	$sucursal = Sucursales::findOrFail($almacen->sucursal_id);
    	$sucursales = Sucursales::all();

    	return view('admin.almacenes.modificar')
    		->with('titulo','Modificar el almacen '.$almacen->nombre)
    		->with('almacen',$almacen)
    		->with('sucursales',$sucursales)
    		->with('sucursal',$sucursal)
    		;

    }


    public function actualizar(Request $request){

    	$validate = $request->validate([
    		'id' => 'required',
    		'nombre' => 'required',
    		'ubicacion' => 'required',
    		'sucursal' => 'required'
    	]);

    	$almacen = Almacenes::findOrFail($request->id);

    	$almacen->nombre = $request->nombre;
    	$almacen->ubicacion = $request->ubicacion;
    	$almacen->sucursal_id = $request->sucursal;

    	$almacen->update();

    	return redirect()->back()->with('success','Se Actualizo correctamente la informacion.');
    }


    public function eliminar(Request $request){
    	$validate = $request->validate([
    		'id' => 'required'
    	]);

    	$almacen = Almacenes::findOrFail($request->id);

    	$almacen->status = 0;

    	$almacen->update();

    	return redirect()->back()->with('success','Se Elimino el almacen.');	

    }

}
