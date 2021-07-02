<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PassSisOp;
use App\Computadoras;
use App\Laptops;
use App\Servidores;

use Illuminate\Support\Facades\Crypt;
use App\Exports\ArchivoPasswordUsuarios;
use Maatwebsite\Excel\Facades\Excel;

class PassSisOpController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inicio(){

    	$usuarios = PassSisOp::all();
    	
    	return view('sistemas.sistemasop.index')
    		->with('titulo', 'Administracion de Usuarios de sistemas operativos')
    		->with('usuarios',$usuarios)
    		;
    }

    public function nuevo(){

    	$computadoras = Computadoras::all();
    	$laptops = Laptops::all();
    	$servidores = Servidores::all();

    	return view('sistemas.sistemasop.nuevo')
    		->with('titulo', 'Añadir nuevo usuario')
    		->with('computadoras',$computadoras)
    		->with('laptops',$laptops)
    		->with('servidores',$servidores)
    		;
    }

    public function crear(Request $request){

    	$validate = $request->validate([
    		'identificador' => 'required',
    		'sistema' => 'required',
    		'usuario' => 'required',
    		'contrasenia' => 'required',
    		'contrasenia_confirmacion' => 'required|same:contrasenia',
    		'equipo' => 'required'
    	]);

    	$usuario = new PassSisOp();

    	$usuario->sistema = $request->sistema;
    	$usuario->identificador = $request->identificador;

    	if($request->usuario == '-1|-1'){
    		$usuario->equipo_id = null;
    		$usuario->tipo = 0;
    	}
    	else{

    		$equipo = explode("|", $request->equipo);
			$usuario->tipo = $equipo[0];
			$usuario->equipo_id = $equipo[1];
    	}

    	$usuario->usuario = $request->usuario;
    	$usuario->password = Crypt::encryptString($request->contrasenia);

    	$usuario->save();

    	return redirect('sistemas/accesos/sistemaop')->with('success','Se agrego correctamente el usuario '.$usuario->identificador);
    }

    public function cargar_csv(){

    	return view('sistemas.sistemasop.cargar_csv')
    		->with('titulo','Cargar Usuarios desde un archivo.');
    }

    public function exportar_plantilla(){

	    	$export = new ArchivoPasswordUsuarios;

	    	return Excel::download($export, 'ejemplo.xlsx');

    }

    public function ver($id){

    	$password = PassSisOp::findOrFail($id);

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

        return view('sistemas.sistemasop.ver')
            ->with('password',$password)
            ->with('equipo',$equipo)
            ->with('titulo','Informacion asosicada a '.$password->identificador);
    }

    public function modificar($id){

        $password = PassSisOp::findOrFail($id);

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

    	return view('sistemas.sistemasop.modificar')
    		->with('titulo', 'Modificar usuario')
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
    		'sistema' => 'required',
    		'usuario' => 'required',
    		'equipo' => 'required'
    	]);

    	$usuario =  PassSisOp::findOrFail($request->id);

    	$usuario->sistema = $request->sistema;
    	$usuario->identificador = $request->identificador;
    	if($request->equipo == '-1|-1'){
    		$usuario->equipo_id = null;
    		$usuario->tipo = 0;
    	}
    	else{

    		$equipo = explode("|", $request->equipo);
			$usuario->tipo = $equipo[0];
			$usuario->equipo_id = $equipo[1];
    	}

    	$usuario->usuario = $request->usuario;

    	if($request->has('contrasenia') && $request->contrasenia != null){
    		if($request->contrasenia_confirmacion == $request->contrasenia){
    			$usuario->password = Crypt::encryptString($request->contrasenia);
    		}else{
    			return redirect()->back()->with('error','Las contraseñas no coinciden.');
    		}
    	}

    	$usuario->update();

    	return redirect()->back()->with('success','Se modifico correctamente el usuario '.$usuario->identificador);
    }


    public function eliminar (Request $request){
    	$validate = $request->validate([
    		'id' => 'required'
    	]);

    	$password = PassSisOp::findOrFail($request->id);

    	$password->delete();

    	return redirect('sistemas/accesos/sistemaop')->with('success','Se elimino el usuario.');
    }
}
