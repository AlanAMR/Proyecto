<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Puestos;
use App\Areas;
class PuestosController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inicio(){

    	$puestos = Puestos::
    		select('puesto.*','empresas.nombre as empresa','areas.valor as area')
    		->join('areas','areas.id','=','puesto.area_id')
    		->join('empresas','empresas.id','=','areas.empresa_id')
    		->where('empresas.status','!=','0')
    		->where('areas.status','!=','0')
    		->where('puesto.status','!=','0')
    		->get();

    	return view('admin.puestos.index')
    		->with('titulo','Listado de puestos de trabajo.')
    		->with('puestos',$puestos)
    	;
    }

    public function nuevo(){
    	$areas = Areas::
    		select('areas.*','empresas.nombre as empresa')
			->join('empresas','empresas.id','=','areas.empresa_id')
			->where('empresas.status','!=','0')
			->where('areas.status','!=','0')
			->get();

		return view('admin.puestos.nuevo')
			->with('titulo','Añadir un puesto de trabajo.')
			->with('areas',$areas)
		;
    }


    public function crear(Request $request){
    	$validate = $request->validate([
    		'nombre' => 'required',
    		'area_id' => 'required'
    	]);

    	$puesto = new Puestos();
    	
    	$puesto->valor = $request->nombre;
    	$puesto->area_id = $request->area_id;

    	$puesto->save();

    	return redirect('/administracion/puestos')->with('success','Se añadio el puesto: '.$puesto->valor);
    }

    public function modificar($id){

    	$puesto = Puestos::findOrFail($id);
    	$area = Areas::findOrFail($puesto->area_id);

    	$areas = Areas::
    		select('areas.*','empresas.nombre as empresa')
			->join('empresas','empresas.id','=','areas.empresa_id')
			->where('empresas.status','!=','0')
			->where('areas.status','!=','0')
			->get();

		return view('admin.puestos.modificar')
			->with('titulo','Modificar el puesto: '.$puesto->valor)
			->with('puesto',$puesto)
			->with('area',$area)
			->with('areas',$areas)
		;
    }	

    public function actualizar(Request $request){

    	$validate = $request->validate([
    		'id' => 'required',
    		'nombre' => 'required',
    		'area_id' => 'required'
    	]);

    	$puesto = Puestos::findOrFail($request->id);

    	$puesto->valor = $request->nombre;
    	$puesto->area_id = $request->area_id;

    	$puesto->update();

    	return redirect()->back()->with('success','Se actualizo la informacion del puesto: '.$puesto->valor);

    }


    public function eliminar(Request $request){

    	$validate = $request->validate([
    		'id' => 'required'
    	]);


    	try{
    		$puesto = Puestos::findOrFail($request->id);
    		$puesto->status = 0;
    		$puesto->update();

    	}
    	catch(Exception $ex){
    		return redirect()->back()->with('error','No se pudo eliminar el puesto seleccionado');
    	}

    	return redirect()->back()->with('success','Se elimino correctamente el puesto: '.$puesto->valor);
    }
}
