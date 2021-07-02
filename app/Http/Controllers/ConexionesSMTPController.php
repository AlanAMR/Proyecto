<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ConexionSMTP;

use Illuminate\Support\Facades\Crypt;
use App\Exports\ArchivoSMTP;
use Maatwebsite\Excel\Facades\Excel;

use App\Servidores;
use App\PassEmail;

class ConexionesSMTPController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inicio(){

    	$conexiones = ConexionSMTP::
            select('conexionesmtp.*','servidores.identificador as servidor')
            ->leftjoin('servidores','servidores.id','=','conexionesmtp.servidor_id')
            ->get();
        ;

    	return view('sistemas.smtp.index')
    		->with('titulo', 'Administracion de las conexiones SMTP')
    		->with('conexiones',$conexiones)
    		;

    }

    public function cargar_csv(){

    	return view('sistemas.smtp.cargar_csv')
    		->with('titulo','Cargar Claves desde un archivo.');
    }

    public function exportar_plantilla(){

	    	$export = new ArchivoSMTP;
	    	return Excel::download($export, 'ejemplo.xlsx');
    }

    public function nuevo(){

        $servidores = Servidores::all();

        return view('sistemas.smtp.nuevo')
            ->with('titulo','Nueva conexion smtp')
            ->with('servidores',$servidores)
            ;
    }


    public function crear(Request $request){

        $valdiate = $request->validate([
            'servidor' => 'required',
            'identificador' => 'required',
            'dominio' => 'required',
            'protocolo' => 'required',
            'servidor_entrante' => 'required',
            'servidor_saliente' => 'required',
            'puerto_entrada' => 'required',
            'puerto_salida' => 'required',
            'cifrado_entrada' => 'required',
            'cifrado_salida' => 'required'
        ]);

        $smtp = new ConexionSMTP();

        if($request->servidor == '-1'){
            $smtp->servidor_id = null;
        }else
        {
            $smtp->servidor_id = $request->servidor;
        }

        $smtp->identificador = $request->identificador;
        $smtp->dominio = $request->dominio;
        $smtp->protocolo_acceso = $request->protocolo;
        $smtp->servidor_entrante = $request->servidor_entrante;
        $smtp->servidor_saliente = $request->servidor_saliente;
        $smtp->puerto_entrada = $request->puerto_entrada;
        $smtp->puerto_salida = $request->puerto_salida;
        $smtp->cifrado_entrante = $request->cifrado_entrada;
        $smtp->cifrado_saliente = $request->cifrado_salida;

        $smtp->save();

        return redirect('sistemas/conexiones/smtp')->with('success','La conexion '.$smtp->identificador.' se añadio con exito');

    }


    public function modificar($id){

        $conexion = ConexionSMTP::findOrFail($id);
        $servidor = Servidores::where('id','=',$conexion->servidor_id)->first();
        $servidores = Servidores::all();

        return view('sistemas.smtp.modificar')
            ->with('titulo','Modificar la conexion '.$conexion->identificador)
            ->with('conexion',$conexion)
            ->with('servidor',$servidor)
            ->with('servidores',$servidores)
            ;
    }

    public function actualizar(Request $request){

        $valdiate = $request->validate([
            'id' => 'required',
            'servidor' => 'required',
            'identificador' => 'required',
            'dominio' => 'required',
            'protocolo' => 'required',
            'servidor_entrante' => 'required',
            'servidor_saliente' => 'required',
            'puerto_entrada' => 'required',
            'puerto_salida' => 'required',
            'cifrado_entrada' => 'required',
            'cifrado_salida' => 'required'
        ]);

        $smtp = ConexionSMTP::findOrFail($request->id);

        if($request->servidor == '-1'){
            $smtp->servidor_id = null;
        }else
        {
            $smtp->servidor_id = $request->servidor;
        }
        $smtp->identificador = $request->identificador;
        $smtp->dominio = $request->dominio;
        $smtp->protocolo_acceso = $request->protocolo;
        $smtp->servidor_entrante = $request->servidor_entrante;
        $smtp->servidor_saliente = $request->servidor_saliente;
        $smtp->puerto_entrada = $request->puerto_entrada;
        $smtp->puerto_salida = $request->puerto_salida;
        $smtp->cifrado_entrante = $request->cifrado_entrada;
        $smtp->cifrado_saliente = $request->cifrado_salida;

        $smtp->update();

        return redirect()->back()->with('success','La conexion '.$smtp->identificador.' se actualizo con exito');

    }


    public function eliminar(Request $request){
        $validate = $request->validate([
            'id' => 'required'
        ]);

        $conexion = ConexionSMTP::findOrFail($request->id);
        $conexion->delete();

        return redirect('sistemas/conexiones/smtp')->with('success','La conexion se elimino con exito');
    }


    public function ver($id){

        $conexion = ConexionSMTP::findOrFail($id);
        $servidor = Servidores::where('id','=',$conexion->servidor_id)->first();

        $cuentas = PassEmail::
            select('passemail.*','empleado.nombre as empleado')
            ->leftJoin('empleado', 'empleado.id', '=', 'passemail.empleado_id')
            ->get();
        ;

        return view('sistemas.smtp.ver')
            ->with('titulo','Detalles de la conexion '.$conexion->identificador)
            ->with('conexion',$conexion)
            ->with('servidor',$servidor)
            ->with('cuentas',$cuentas)
            ;

    }
}
