<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresas;
use App\Sucursales;

class EmpresasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function inicio(){
    	
    	$empresas = Empresas::all();
    	
    	return view('admin.empresas.index')
    		->with('empresas',$empresas)
    		->with('titulo','Gestion de Empresas')
    	;
    }

    public function nuevo(){

    	return view('admin.empresas.nuevo')
    		->with('titulo','Añadir nueva empresa')
    	;
    }


    public function crear(Request $request){
    	
    	$valdiate = $request->validate([
    		'nombre' => 'required'
    	]);

    	$empresa = new Empresas();

    	$empresa->nombre = $request->nombre;

    	$empresa->save();

    	return redirect('administracion/empresas')->with('success','Empresa '.$empresa->nombre.' creada con exito.'); 
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
	    		$empresa = Empresas::findOrFail($request->id);
	    		$nombre = $empresa->nombre;
	    		$empresa->delete();
			}
			catch(Exception $ex){
				return redirect('administracion/empresas')->with('error','La Empresa seleccionada no se pudo aliminar.(1).');	
			}
    		return redirect('administracion/empresas')->with('success','La Empresa '.$nombre.' se eliminino con exito.');
    	
    	}else{
    		return redirect('administracion/empresas')->with('error','La Empresa seleccionada no se pudo aliminar, (Error 2, Hay sucursales vinculadas a la empresa).');	
    	}
    }


    public function modificar($id){

    	$empresa = Empresas::findOrFail($id);

    	return view('admin.empresas.modificar')
    		->with('empresa',$empresa)
    		->with('titulo','Modificar la empresa '.$empresa->nombre)
    	;
    }

    public function actualizar(Request $request){
    	
    	$validate = $request->validate([
    		'id' => 'required',
    		'nombre' => 'required'
    	]);

    	$empresa = Empresas::findOrFail($request->id);

    	$empresa->nombre = $request->nombre;

    	$empresa->update();

    	return redirect()->back()->with('success','Se actualizo la informacion de l a empresa.');

    }
}

