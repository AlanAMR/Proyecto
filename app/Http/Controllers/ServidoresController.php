<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Servidores;

use App\Exports\ArchivoServidores;
use Maatwebsite\Excel\Facades\Excel;

use App\ConexionSMTP;
use App\ConexionDBMS;
use App\ConexionSMB;
use App\ConexionRAS;
use App\ConexionFTP;
use App\ConexionVPN;

use App\PassSisOp;
use App\PassAnyDesk;
use App\PassBitlocker;

use App\Carpetas;


class ServidoresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inicio(){

    	$servidores = Servidores::all();

    	return view('sistemas.servidores.index')
    		->with('titulo','Servidores')
    		->with('servidores',$servidores)
    		;
    }

    public function ver($id)
    {
        $servidor = Servidores::findOrFail($id);
        $conexionessmtp = ConexionSMTP::where('servidor_id','=',$servidor->id)->get();
        $conexionesdbms = ConexionDBMS::where('servidor_id','=',$servidor->id)->get();
        $conexionessmb = ConexionSMB::where('servidor_id','=',$servidor->id)->get();
        $conexionesras = ConexionRAS::where('servidor_id','=',$servidor->id)->get();
        $conexionesftp = ConexionFTP::where('servidor_id','=',$servidor->id)->get();
        $conexionesvpn = ConexionVPN::where('servidor_id','=',$servidor->id)->get();
        
        $carpetas = Carpetas::
            select('carpetas.*')
            ->join('conexionessmb','conexionessmb.id','=','carpetas.conexion_id')
            ->where('conexionessmb.servidor_id','=',$servidor->id)
            ->get();

        $usuariossisop = PassSisOp::where('equipo_id','=',$servidor->id)->where('tipo','=','1')->get();
        $usuariosanydesk = PassAnyDesk::where('equipo_id','=',$servidor->id)->where('tipo','=','1')->get();
        $usuariosBitlocker = PassBitlocker::where('equipo_id','=',$servidor->id)->where('tipo','=','1')->get();
        

        return view('sistemas.servidores.ver')
            ->with('servidor',$servidor)
            ->with('smtp',$conexionessmtp)
            ->with('dbms',$conexionesdbms)
            ->with('smb',$conexionessmb)
            ->with('ras',$conexionesras)
            ->with('ftp',$conexionesftp)
            ->with('carpetas',$carpetas)
            ->with('bitlocker',$usuariosBitlocker)
            ->with('sisop',$usuariossisop)
            ->with('anydesk',$usuariosanydesk)
            ->with('vpn',$conexionesvpn)
            ->with('titulo','Detalles del servidor '.$servidor->identificador)
            ;

    }

    public function cargar_csv(){
    	return view('sistemas.servidores.cargar_csv')
    		->with('titulo','Cargar servidores desde un archivo.');
    }

    public function exportar_plantilla(){
	    	$export = new ArchivoServidores;
	    	return Excel::download($export, 'ejemplo.xlsx');
    }

    public function nuevo(){
    	return view('sistemas.servidores.nuevo')
    	->with('titulo','Nuevo Servidor');
    }

    public function crear(Request $request){
    	$validate = $request->validate([
    		'identificador' => 'required',
    		'num_serie' => 'required',
    		'tipo' => 'required',
    		'propietario' => 'required',
    		'marca' => 'required',
    		'modelo' => 'required',
    		'procesador' => 'required',
    		'ram' => 'required',
    		'almacenamiento' => 'required',
    		'sistema_operativo' => 'required',
    		'antivirus' => 'required'
    	]);

    	$servidor = new servidores();

    	$servidor->identificador = $request->identificador;
    	$servidor->num_serie = $request->num_serie;
    	$servidor->tipo = $request->tipo;
    	$servidor->propietario = $request->propietario;
    	$servidor->marca = $request->marca;
    	$servidor->modelo = $request->modelo;
    	$servidor->procesador = $request->procesador;
    	$servidor->ram = $request->ram;
    	$servidor->almacenamiento = $request->almacenamiento;
    	$servidor->sistema_operativo = $request->sistema_operativo;
    	$servidor->antivirus = $request->antivirus;

    	$servidor->save();

    	return redirect('sistemas/servidores')->with('success','Servidor '.$servidor->identificador.' añadido con exito');

    }


    public function eliminar(Request $request){
    	$validate = $request->validate([
    		'id' => 'required'
    	]);

    	$servidor = Servidores::findOrFail($request->id);
    	
        $todelete = true;

        if($todelete)
    	   $todelete = (ConexionSMTP::where('servidor_id','=',$servidor->id)->count() == 0);

        if($todelete)
           $todelete = (ConexionDBMS::where('servidor_id','=',$servidor->id)->count() == 0);

       if($todelete)
           $todelete = (ConexionSMB::where('servidor_id','=',$servidor->id)->count() == 0);

        if($todelete)
           $todelete = (ConexionRAS::where('servidor_id','=',$servidor->id)->count() == 0);

        if($todelete)
           $todelete = (ConexionFTP::where('servidor_id','=',$servidor->id)->count() == 0);

        if($todelete)
           $todelete = (ConexionVPN::where('servidor_id','=',$servidor->id)->count() == 0);

       if($todelete)
           $todelete = (PassSisOp::where('equipo_id','=',$servidor->id)->where('tipo','=','1')->count() == 0);

       if($todelete)
           $todelete = (PassAnyDesk::where('equipo_id','=',$servidor->id)->where('tipo','=','1')->count() == 0);

       if($todelete)
           $todelete = (PassBitlocker::where('equipo_id','=',$servidor->id)->where('tipo','=','1')->count() == 0);

        if($todelete){
    	   $servidor->delete();
        }
        else{
            return redirect('sistemas/servidores')->with('error','No se puede eliminar el servidor, desasocie las conexiones antes de eiliminarlo'); 
        }
    	return redirect('sistemas/servidores')->with('success','Servidor eliminado con exito');
    }

    public function modificar($id){
    	
    	$servidor = Servidores::findOrFail($id);

    	return view('sistemas.servidores.modificar')
    		->with('titulo','Modificar el servidor '.$servidor->identificador)
    		->with('servidor',$servidor)
    		;
    }

    public function actualizar(Request $request){
    	$validate = $request->validate([
    		'id' => 'required',
    		'identificador' => 'required',
    		'num_serie' => 'required',
    		'tipo' => 'required',
    		'propietario' => 'required',
    		'marca' => 'required',
    		'modelo' => 'required',
    		'procesador' => 'required',
    		'ram' => 'required',
    		'almacenamiento' => 'required',
    		'sistema_operativo' => 'required',
    		'antivirus' => 'required'
    	]);

    	$servidor = Servidores::findOrFail($request->id);

    	$servidor->identificador = $request->identificador;
    	$servidor->num_serie = $request->num_serie;
    	$servidor->tipo = $request->tipo;
    	$servidor->propietario = $request->propietario;
    	$servidor->marca = $request->marca;
    	$servidor->modelo = $request->modelo;
    	$servidor->procesador = $request->procesador;
    	$servidor->ram = $request->ram;
    	$servidor->almacenamiento = $request->almacenamiento;
    	$servidor->sistema_operativo = $request->sistema_operativo;
    	$servidor->antivirus = $request->antivirus;

    	$servidor->update();

    	return redirect()->back()->with('success','Servidor '.$servidor->identificador.' actualizado con exito');

    }
}
