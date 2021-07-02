<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PassBitlocker;
use App\Computadoras;
use App\Laptops;
use App\Servidores;

use Illuminate\Support\Facades\Crypt;
use App\Exports\ArchivoPasswordBitlocker;
use Maatwebsite\Excel\Facades\Excel;

class PassBitlockerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inicio(){

    	$claves = PassBitlocker::all();
    	
    	return view('sistemas.bitlocker.index')
    		->with('titulo', 'Administracion de correos electronicos')
    		->with('claves',$claves)
    		;
    }

    public function cargar_csv(){

    	return view('sistemas.bitlocker.cargar_csv')
    		->with('titulo','Cargar Claves desde un archivo.');
    }

    public function exportar_plantilla(){

	    	$export = new ArchivoPasswordBitlocker;

	    	return Excel::download($export, 'ejemplo.xlsx');

    }

    public function nuevo(){

    	$computadoras = Computadoras::all();
    	$laptops = Laptops::all();
    	$servidores = Servidores::all();

    	return view('sistemas.bitlocker.nuevo')
    		->with('titulo', 'Añadir nueva clave')
    		->with('computadoras',$computadoras)
    		->with('laptops',$laptops)
    		->with('servidores',$servidores)
    		;
    }

    public function crear(Request $request){

    	$validate = $request->validate([
    		'equipo' => 'required',
    		'identificador' => 'required',
    		'clave' => 'required',
    		'clave_recuperacion' => 'required',
    		'clave_confirmacion' => 'required|same:clave_recuperacion',
    	]);

    	$clave = new PassBitlocker();

    	$clave->identificador = $request->identificador;

    	if($request->equipo == '-1|-1'){
    		$clave->equipo_id = null;
    		$clave->tipo = 0;
    	}
    	else{

    		$equipo = explode("|", $request->equipo);
			$clave->tipo = $equipo[0];
			$clave->equipo_id = $equipo[1];
    	}

    	$clave->clave = $request->clave;
    	$clave->clave_recuperacion = Crypt::encryptString($request->clave_recuperacion);

    	$clave->save();

    	return redirect('sistemas/accesos/bitlocker')->with('success','Se agrego correctamente la clave '.$clave->identificador);

    }

    public function ver($id){

    	$password = PassBitlocker::findOrFail($id);

    	$equipo = null;
    	switch ($password->tipo) {
    		case '1':
    			$equipo = Servidores::where('id','=',$password->equipo_id)->first();
    			break;

    		case '2':
    			$equipo = Computadoras::where('id','=',$password->equipo_id)->first();
    			break;

    		case '3':
    			$equipo = Laptops::where('id','=',$password->equipo_id)->first();
    			break;
    		
    		default:
    			$equipo = null;
    			break;
    	}

        return view('sistemas.bitlocker.ver')
            ->with('password',$password)
            ->with('equipo',$equipo)
            ->with('titulo','Informacion asosicada a '.$password->identificador);
    }

    public function modificar($id){

        $password = PassBitlocker::findOrFail($id);

        $computadoras = Computadoras::all();
    	$laptops = Laptops::all();
    	$servidores = Servidores::all();

    	$equipo = null;

    	switch ($password->tipo) {
    		case '1':
    			$equipo = Servidores::where('id','=',$password->equipo_id)->first();
    			break;

    		case '2':
    			$equipo = Computadoras::where('id','=',$password->equipo_id)->first();
    			break;

    		case '3':
    			$equipo = Laptops::where('id','=',$password->equipo_id)->first();
    			break;
    		
    		default:
    			$equipo = null;
    			break;
    	}

    	return view('sistemas.bitlocker.modificar')
    		->with('titulo', 'Modificar Clave')
    		->with('password',$password)
    		->with('computadoras',$computadoras)
    		->with('laptops',$laptops)
    		->with('servidores',$servidores)
    		->with('equipo',$equipo)
    		;
    }

    public function actualizar(Request $request){

    	$validate = $request->validate([
    		'id' => 'required',
    		'identificador' => 'required',
    		'equipo' => 'required',
    		'clave' => 'required'
    	]);

    	$clave =  PassBitlocker::findOrFail($request->id);

    	$clave->identificador = $request->identificador;
    	if($request->usuario == '-1|-1'){
    		$clave->equipo_id = null;
    		$clave->tipo = 0;
    	}
    	else{

    		$equipo = explode("|", $request->equipo);
			$clave->tipo = $equipo[0];
			$clave->equipo_id = $equipo[1];
    	}

    	$clave->clave = $request->clave;

    	if($request->has('clave_recuperacion') && $request->has('clave_confirmacion') && $request->clave_recuperacion != null){
    		if($request->clave_recuperacion == $request->clave_confirmacion){
    			$clave->clave_recuperacion = Crypt::encryptString($request->clave_recuperacion);
    		}else{
    			return redirect()->back()->with('error','Las contraseñas no coinciden.');
    		}
    	}

    	$clave->update();

    	return redirect()->back()->with('success','Se modifico correctamente la clave '.$clave->identificador);
    }

    public function eliminar(Request $request){
    	$valdiate = $request->validate([
    		'id' => 'required'
    	]);

    	$clave = PassBitlocker::findOrFail($request->id);
    	$clave->delete();

    	return redirect('sistemas/accesos/bitlocker')->with('success','Se elimino correctamente la clave');	
    }
}
