<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Crypt;

use App\Exports\ArchivoPasswordEmails;
use Maatwebsite\Excel\Facades\Excel;

use App\ConexionSMTP;

use App\PassEmail;
use App\Empleados;

class PassCorreosController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function inicio(){

    	$emails = PassEmail::
    		select('passemail.*','empleado.nombre as empleado','conexionesmtp.identificador as servidor')
    		->leftJoin('empleado', 'empleado.id', '=', 'passemail.empleado_id')
            ->leftJoin('conexionesmtp', 'conexionesmtp.id', '=', 'passemail.conexion_id')
            ->get();
    	;

    	return view('sistemas.emails.index')
    		->with('titulo', 'Administracion de correos electronicos')
    		->with('emails',$emails)
    		;

    }


    public function nuevo(){

    	$empleados = Empleados::all();
        $conexiones = ConexionSMTP::
            select('conexionesmtp.*','servidores.identificador as servidor')
            ->leftjoin('servidores','servidores.id','=','conexionesmtp.servidor_id')
            ->get();

    	return view('sistemas.emails.nuevo')
    		->with('titulo', 'Añadir nuevo correo electronico')
    		->with('empleados',$empleados)
            ->with('conexiones',$conexiones)
    		;
    }

    public function crear(Request $request){

    	$validate = $request->validate([
    		'identificador' => 'required',
            'conexion' => 'required',
    		'email' => 'required',
    		'contrasenia' => 'required',
    		'contrasenia_confirmacion' => 'required|same:contrasenia',
    		'empleado' => 'required'
    	]);

    	$email = new PassEmail();

    	$email->identificador = $request->identificador;

    	if($request->empleado == '-1')
    		$email->empleado_id = null;
    	else
    		$email->empleado_id = $request->empleado;

    	$email->email = $request->email;
    	$email->password = Crypt::encryptString($request->contrasenia);

    	$email->save();

    	return redirect('sistemas/accesos/correos')->with('success','Se agrego correctamente el correo '.$email->identificador);
    }


    public function cargar_csv(){

    	return view('sistemas.emails.cargar_csv')
    		->with('titulo','Cargar Correos desde un archivo.');
    }

    public function exportar_plantilla(){

	    	$export = new ArchivoPasswordEmails;

	    	return Excel::download($export, 'ejemplo.xlsx');

    }


    public function ver($id){

        $password = PassEmail::findOrFail($id);
        $empleado = Empleados::where('id','=',$password->empleado_id)->first();
        $conexion = ConexionSMTP::where('id','=',$password->conexion_id)->first();

        return view('sistemas.emails.ver')
            ->with('password',$password)
            ->with('empleado',$empleado)
            ->with('conexion',$conexion)
            ->with('titulo','Informacion asosicada a '.$password->identificador);
    }


    public function modificar($id){

        $password = PassEmail::findOrFail($id);
        
        $empleado = Empleados::where('id','=',$password->empleado_id)->first();       
        $empleados = Empleados::all();

        $conexion = ConexionSMTP::where('id','=',$password->conexion_id)->first();
        $conexiones = ConexionSMTP::all();

        return view('sistemas.emails.modificar')
            ->with('password',$password)
            ->with('empleado',$empleado)
            ->with('empleados',$empleados)
            ->with('conexion',$conexion)
            ->with('conexiones',$conexiones)
            ->with('titulo','Modificar la contraseña '.$password->identificador);
    }


    public function actualizar(Request $request){

        $validate = $request->validate([
            'id' => 'required',
            'identificador' => 'required',
            'email' => 'required',
            'conexion' => 'required',
            'empleado' => 'required'
        ]);

        $email = PassEmail::findOrFail($request->id);

        $email->identificador = $request->identificador;

        if($request->empleado == '-1')
            $email->empleado_id = null;
        else{
            $email->empleado_id = $request->empleado;
        }

        if($request->conexion == '-1')
            $email->conexion_id = null;
        else{
            $email->conexion_id = $request->conexion;
        }

        $email->email = $request->email;

        if($request->has('contrasenia') && $request->has('contrasenia_confirmacion') && $request->contrasenia_confirmacion != null){
            if($request->contrasenia == $request->contrasenia_confirmacion){
                $email->password = Crypt::encryptString($request->contrasenia);
            }
            else{
                return redirect('sistemas/accesos/correos')->with('error','Las contraseñas no coinciden.');
            }
        }

        $email->update();

        return redirect()->back()->with('success','Se actualizo el correo '.$email->identificador);
    }

    public function eliminar(Request $request){

        $validate = $request->validate([
            'id' => 'required'
        ]);

        $password = PassEmail::findOrFail($request->id);

        $password->delete();

        return redirect('sistemas/accesos/correos')->with('success','Las contraseñas se elimino con exito.');

    }

}
