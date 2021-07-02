<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresas;
use App\Sucursales;
use App\Almacenes;

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
            ->where('sucursales.status','!=','0')
    		->get();
    	
    	return view('admin.sucursales.index')
    		->with('sucursales',$sucursales)
    		->with('titulo','Gestion de sucursales')
    	;
    }

    public function nuevo(){

    	$empresas = Empresas::where('status','!=','0')->get();

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

    	$almacen = Almacenes::
    		where('sucursal_id','=',$request->id)
            ->where('status','!=','0')
    		->get();

    	$nombre;

    	if($almacen->count() == 0){

    		try{
	    		$sucursal = sucursales::findOrFail($request->id);
	    		$nombre = $sucursal->nombre;
                $sucursal->status = 0;
	    		$sucursal->update();
			}
			catch(Exception $ex){
				return redirect('administracion/sucursales')->with('error','La Sucursal seleccionada no se pudo aliminar.(1).');	
			}
    		return redirect('administracion/sucursales')->with('success','La Sucursal '.$nombre.' se eliminino con exito.');
    	
    	}else{
    		return redirect('administracion/sucursales')->with('error','La Sucursal seleccionada no se pudo aliminar, (Error 2, Hay almacenes vinculados a la sucursal).');	
    	}
    }


    public function modificar($id){

    	$sucursal = sucursales::findOrFail($id);

        $empresa = Empresas::findOrFail($sucursal->empresa_id);
        $empresas = Empresas::where('status','!=','0')->get();

    	return view('admin.sucursales.modificar')
    		->with('sucursal',$sucursal)
            ->with('empresas',$empresas)
            ->with('empresa',$empresa)
    		->with('titulo','Modificar la sucursal '.$sucursal->nombre)
    	;
    }

    public function actualizar(Request $request){
    	
    	$validate = $request->validate([
    		'id' => 'required',
    		'nombre' => 'required',
            'ubicacion' => 'required',
            'empresa' => 'required'
     	]);

    	$sucursal = sucursales::findOrFail($request->id);

    	$sucursal->nombre = $request->nombre;
        $sucursal->ubicacion = $request->ubicacion;
        $sucursal->empresa_id = $request->empresa;
    	$sucursal->update();

    	return redirect()->back()->with('success','Se actualizo la informacion de la Sucursal.');

    }
}
