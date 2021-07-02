<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PassContpaq;
use App\Empleados;


use Illuminate\Support\Facades\Crypt;
use App\Exports\ArchivoPasswordContpaq;
use Maatwebsite\Excel\Facades\Excel;

class PassContpaqController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inicio(){

    	$contpaq = PassContpaq::
    		select('passcontpaq.*','empleado.nombre as empleado')
    		->leftJoin('empleado', 'empleado.id', '=', 'passcontpaq.empleado_id')
            ->get();
    	;

    	return view('sistemas.contpaq.index')
    		->with('titulo', 'Administracion de Usuarios de Contpaq')
    		->with('contpaq',$contpaq)
    		;

    }


    public function nuevo(){

    	$empleados = Empleados::all();

    	return view('sistemas.contpaq.nuevo')
    		->with('titulo', 'Añadir nuevo Usuario de Contpaq')
    		->with('empleados',$empleados)
    		;
    }

    public function crear(Request $request){

    	$validate = $request->validate([
    		'identificador' => 'required',
    		'usuario' => 'required',
    		'contrasenia' => 'required',
    		'contrasenia_confirmacion' => 'required|same:contrasenia',
    		'empleado' => 'required'
    	]);

    	$contpaq = new PassContpaq();

    	$contpaq->identificador = $request->identificador;

    	if($request->empleado == '-1')
    		$contpaq->empleado_id = null;
    	else
    		$contpaq->empleado_id = $request->empleado;

    	$contpaq->usuario = $request->usuario;
    	$contpaq->password = Crypt::encryptString($request->contrasenia);

    	$contpaq->save();

    	return redirect('sistemas/accesos/contpaq')->with('success','Se agrego correctamente el Usuario '.$contpaq->identificador);
    }


    public function cargar_csv(){

    	return view('sistemas.contpaq.cargar_csv')
    		->with('titulo','Cargar Correos desde un archivo.');
    }

    public function exportar_plantilla(){

	    	$export = new ArchivoPasswordContpaq;

	    	return Excel::download($export, 'ejemplo.xlsx');

    }


    public function ver($id){

        $password = PassContpaq::findOrFail($id);
        $empleado = Empleados::where('id','=',$password->empleado_id)->first();

        return view('sistemas.contpaq.ver')
            ->with('password',$password)
            ->with('empleado',$empleado)
            ->with('titulo','Informacion asosicada a '.$password->identificador);
    }


    public function modificar($id){

        $password = PassContpaq::findOrFail($id);
        $empleado = Empleados::where('id','=',$password->empleado_id)->first();        
        $empleados = Empleados::all();

        return view('sistemas.contpaq.modificar')
            ->with('password',$password)
            ->with('empleado',$empleado)
            ->with('empleados',$empleados)
            ->with('titulo','Modificar la contraseña '.$password->identificador);
    }


    public function actualizar(Request $request){

        $validate = $request->validate([
            'id' => 'required',
            'identificador' => 'required',
            'usuario' => 'required',
            'empleado' => 'required'
        ]);

        $contpaq = PassContpaq::findOrFail($request->id);

        $contpaq->identificador = $request->identificador;

        if($request->empleado == '-1')
            $contpaq->empleado_id = null;
        else{
            $contpaq->empleado_id = $request->empleado;
        }

        $contpaq->usuario = $request->usuario;

        if($request->has('contrasenia') && $request->has('contrasenia_confirmacion') && $request->contrasenia_confirmacion != null){
            if($request->contrasenia == $request->contrasenia_confirmacion){
                $contpaq->password = Crypt::encryptString($request->contrasenia);
            }
            else{
                return redirect('sistemas/accesos/correos')->with('error','Las contraseñas no coinciden.');
            }
        }

        $contpaq->update();

        return redirect()->back()->with('success','Se actualizo el Usuario '.$contpaq->identificador);
    }

    public function eliminar(Request $request){

        $validate = $request->validate([
            'id' => 'required'
        ]);

        $password = PassContpaq::findOrFail($request->id);

        $password->delete();

        return redirect('sistemas/accesos/contpaq')->with('success','El usuario se elimino con exito.');

    }
}
