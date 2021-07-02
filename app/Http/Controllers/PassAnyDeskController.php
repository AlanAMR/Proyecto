<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PassAnyDesk;
use App\Computadoras;
use App\Laptops;
use App\Servidores;

use Illuminate\Support\Facades\Crypt;
use App\Exports\ArchivoPasswordAnydesk;
use Maatwebsite\Excel\Facades\Excel;
class PassAnyDeskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inicio(){

    	$anydesk = PassAnyDesk::all();
    	
    	return view('sistemas.anydesk.index')
    		->with('titulo', 'Administracion de correos electronicos')
    		->with('anydesk',$anydesk)
    		;
    }

    public function ver($id){

    	$password = PassAnyDesk::findOrFail($id);

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

        return view('sistemas.anydesk.ver')
            ->with('password',$password)
            ->with('equipo',$equipo)
            ->with('titulo','Informacion asosicada a '.$password->identificador);
    }

    public function nuevo(){

    	$computadoras = Computadoras::all();
    	$laptops = Laptops::all();
    	$servidores = Servidores::all();

    	return view('sistemas.anydesk.nuevo')
    		->with('titulo', 'Añadir nuevo AnyDesk')
    		->with('computadoras',$computadoras)
    		->with('laptops',$laptops)
    		->with('servidores',$servidores)
    		;
    }

    public function crear(Request $request){

    	$validate = $request->validate([
    		'identificador' => 'required',
    		'anydesk' => 'required',
    		'contrasenia' => 'required',
    		'contrasenia_confirmacion' => 'required|same:contrasenia',
    		'equipo' => 'required'
    	]);

    	$anydesk = new PassAnyDesk();

    	$anydesk->identificador = $request->identificador;

    	if($request->equipo == '-1|-1'){
    		$anydesk->equipo_id = null;
    		$anydesk->tipo = 0;
    	}
    	else{

    		$equipo = explode("|", $request->equipo);
			$anydesk->tipo = $equipo[0];
			$anydesk->equipo_id = $equipo[1];
    	}

    	$anydesk->anydesk = $request->anydesk;
    	$anydesk->password = Crypt::encryptString($request->contrasenia);

    	$anydesk->save();

    	return redirect('sistemas/accesos/anydesk')->with('success','Se agrego correctamente el AnyDesk '.$anydesk->identificador);
    }
    
    public function cargar_csv(){

    	return view('sistemas.anydesk.cargar_csv')
    		->with('titulo','Cargar AnyDesk desde un archivo.');
    }

    public function exportar_plantilla(){

	    	$export = new ArchivoPasswordAnydesk;
	    	return Excel::download($export, 'ejemplo.xlsx');

    }



    public function modificar($id){

    	$password = PassAnyDesk::findOrFail($id);

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

    	$computadoras = Computadoras::all();
    	$laptops = Laptops::all();
    	$servidores = Servidores::all();

        return view('sistemas.anydesk.modificar')
            ->with('password',$password)
            ->with('equipo',$equipo)
    		->with('computadoras',$computadoras)
    		->with('laptops',$laptops)
    		->with('servidores',$servidores)
            ->with('titulo','Informacion asosicada a '.$password->identificador);
    }

    public function actualizar(Request $request){

    	$validate = $request->validate([
    		'id' => 'required',
    		'identificador' => 'required',
    		'anydesk' => 'required',
    		'equipo' => 'required'
    	]);

    	$anydesk = PassAnyDesk::findOrFail($request->id);

    	$anydesk->identificador = $request->identificador;

    	if($request->equipo == '-1|-1'){
    		$anydesk->equipo_id = null;
    		$anydesk->tipo = 0;
    	}
    	else{

    		$equipo = explode("|", $request->equipo);
			$anydesk->tipo = $equipo[0];
			$anydesk->equipo_id = $equipo[1];
    	}

    	$anydesk->anydesk = $request->anydesk;

    	if($request->has('contrasenia_confirmacion') && $request->has('contrasenia') && $request->contrasenia_confirmacion != null){
    		if($request->has('contrasenia_confirmacion') == $request->has('contrasenia')){
    			$anydesk->password = Crypt::encryptString($request->contrasenia);
    		}else
    		{
    			return redirect()->back()->with('error','Las contraseñas no coinciden');
    		}
    	}

    	$anydesk->save();

    	return redirect()->back()->with('success','Se Actualizo correctamente el AnyDesk ');
    }

    public function eliminar(Request $request){
    	$validate = $request->validate([
    		'id' => 'required'
    	]);

    	$anydesk = PassAnyDesk::findOrFail($request->id);
    	$anydesk->delete();

    	return redirect('sistemas/accesos/anydesk')->with('success','Se elimino correctamente el AnyDesk ');

    }

}
