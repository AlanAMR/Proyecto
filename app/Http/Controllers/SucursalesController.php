<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresas;
use App\Sucursales;

class SucursalesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function inicio(){
    	
    	$sucursales = Sucursales::
    		select('sucursales.*','empresas.nombre as empresa')
    		->join('empresas','empresas.id','=','sucursales.empresa_id')
    		->get();
    	
    	return view('admin.sucursales.index')
    		->with('sucursales',$sucursales)
    		->with('titulo','Gestion de sucursales')
    	;
    }

    public function nuevo(){

    	$empresas = Empresas::all();

    	return view('admin.sucursales.nuevo')
    		->with('empresas',$empresas)
    		->with('titulo','Añadir nueva empresa')
    	;
    }


    public function crear(Request $request){
    	
    	$valdiate = $request->validate([
    		'nombre' => 'required',
    		'ubicacion' => 'required',
    		'empresa' => 'required'
    	]);

    	$sucursal = new sucursales();

    	$sucursal->nombre = $request->nombre;
    	$sucursal->ubicacion = $request->ubicacion;
    	$sucursal->empresa_id = $request->empresa;
    	$sucursal->save();

    	return redirect('administracion/sucursales')->with('success','Sucursal '.$sucursal->nombre.' creada con exito.'); 
    }

    public function eliminar(Request $request){
    	$validate = $request->validate([
    		'id' => 'required'
    	]);

    	$sucursales = Sucursales::
    		where('empresa_id','=',$request->id)
    		->get();

    	$nombre;

    	if($sucursales->count() == 0){

    		try{
	    		$empresa = sucursales::findOrFail($request->id);
	    		$nombre = $empresa->nombre;
	    		$empresa->delete();
			}
			catch(Exception $ex){
				return redirect('administracion/sucursales')->with('error','La Empresa seleccionada no se pudo aliminar.(1).');	
			}
    		return redirect('administracion/sucursales')->with('success','La Empresa '.$nombre.' se eliminino con exito.');
    	
    	}else{
    		return redirect('administracion/sucursales')->with('error','La Empresa seleccionada no se pudo aliminar, (Error 2, Hay sucursales vinculadas a la empresa).');	
    	}
    }


    public function modificar($id){

    	$empresa = sucursales::findOrFail($id);

    	return view('admin.sucursales.modificar')
    		->with('empresa',$empresa)
    		->with('titulo','Modificar la empresa '.$empresa->nombre)
    	;
    }

    public function actualizar(Request $request){
    	
    	$validate = $request->validate([
    		'id' => 'required',
    		'nombre' => 'required'
    	]);

    	$empresa = sucursales::findOrFail($request->id);

    	$empresa->nombre = $request->nombre;

    	$empresa->update();

    	return redirect()->back()->with('success','Se actualizo la informacion de l a empresa.');

    }
}
