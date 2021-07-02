<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Empresas;
use App\Areas;

class AreasController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inicio(){
    	$areas = Areas::
    		select('areas.*','empresas.nombre as empresa')
    		->join('empresas','empresas.id','=','areas.empresa_id')
    		->where('empresas.status','!=','0')
    		->where('areas.status','!=','0')
    		->get()
    	;

    	return view('admin.areas.index')
    		->with('titulo','Areas funcionales de la empresa')
    		->with('areas',$areas)
    		;
    }

    public function nuevo(){
    	$empresas = Empresas::where('status','!=','0')->get();

    	return view('admin.areas.nuevo')
    		->with('empresas',$empresas)
    		->with('titulo','Nueva Area funcional')
    		;
    }

    public function crear(Request $request){
		$validate = $request->validate([
			'nombre' => 'required',
			'empresa_id' => 'required'
		]);

		$area = new Areas();

		$area->valor = $request->nombre;
		$area->empresa_id = $request->empresa_id;

		$area->save();

		return redirect('/administracion/areas')
            ->with('success','Se añadio la area: '.$area->valor);
    }

    public function modificar($id){
    	
    	$area = Areas::findOrFail($id);
    	$empresa = Empresas::findOrFail($area->empresa_id);

    	$empresas = Empresas::where('status','!=','')->get();
    	
    	return view('admin.areas.modificar')
    		->with('area',$area)
    		->with('empresa',$empresa)
    		->with('empresas',$empresas)
    		->with('titulo','Modificar el area: '.$area->valor )
    		;
    }

    public function actualizar(Request $request){
    	$validate = $request->validate([
    		'id' => 'required',
    		'nombre' => 'required',
    		'empresa_id' => 'required'
    	]);

    	$area = Areas::findOrFail($request->id);

    	$area->valor = $request->nombre;
    	$area->empresa_id = $request->empresa_id;

    	$area->update();

    	return redirect()->back()
            ->with('success','Se Actualizo el area: '.$area->valor);	
    }

    public function eliminar(Request $request){
		
		$validate = $request->validate([
    		'id' => 'required'
    	]);


		try{

	    	$area = Areas::findOrFail($request->id);
	    	$area->status = 0;
	    	$area->update();

		}
		catch(Exception $ex){
			return redirect()->back()
            ->with('error','No se pudo eliminar el area seleccionada.');	
		}
    	return redirect()->back()
            ->with('success','Se Elimino el area: '.$area->valor);

    }
}
