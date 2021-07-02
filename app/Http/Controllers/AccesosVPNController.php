<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\ArchivoUsuarioVPN;

use App\ConexionVPN;
use App\UsuarioVPN;
use App\Servidores;

use Illuminate\Support\Facades\Crypt;
use Maatwebsite\Excel\Facades\Excel;


class AccesosVPNController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inicio(){

    	$usuarios = UsuarioVPN::
            select('usuariovpn.*','conexionesvpn.identificador as conexion')
            ->leftjoin('conexionesvpn','conexionesvpn.id','=','usuariovpn.conexion_id')
            ->get();
        ;

    	return view('sistemas.usuariovpn.index')
    		->with('titulo', 'Administracion de Usuarios VPN')
    		->with('usuarios',$usuarios)
    		;
    }

    public function cargar_csv(){
    	return view('sistemas.usuariovpn.cargar_csv')
    		->with('titulo','Cargar Usuarios VPN desde un archivo.');
    }

    public function exportar_plantilla(){
	    	$export = new ArchivoUsuarioVPN;
	    	return Excel::download($export, 'ejemplo.xlsx');

    }

    public function ver($id){

        $acceso = UsuarioVPN::findOrFail($id);
        $conexion = null;
        
        if($acceso->conexion_id != null){
            $conexion = ConexionVPN::where('id','=',$acceso->conexion_id)->first();
        }

        $servidor = null;

        if($conexion != null){
            if($conexion->servidor_id != null){ 
                $servidor = Servidores::where('id','=',$conexion->servidor_id)->first();
            }
        }

        return view('sistemas.usuariovpn.ver')
            ->with('titulo', 'Ver los detalles de el usuario '.$acceso->identificador)
            ->with('acceso',$acceso)
            ->with('conexion',$conexion)
            ->with('servidor',$servidor)
            ;
    }

    public function nuevo(){

    	$conexiones = ConexionVPN::
            select('conexionesvpn.*','servidores.identificador as servidor')
            ->leftjoin('servidores','servidores.id','=','conexionesvpn.servidor_id')
            ->get()
        ;

    	return view('sistemas.usuariovpn.nuevo')
    		->with('titulo', 'Añadir nuevo Usuario VPN / RDP')
    		->with('conexiones',$conexiones)
    		;
    }

    public function crear(Request $request){

    	$validate = $request->validate([
    		'conexion_id' => 'required',  
    		'identificador' => 'required',
    		'usuario' => 'required',
    		'contrasenia' => 'required',
    		'contrasenia_confirmacion' => 'required|same:contrasenia',
    	]);

        $usuario = new UsuarioVPN();

        if($request->conexion_id == '-1')
            $usuario->conexion_id = null;
        else
            $usuario->conexion_id = $request->conexion_id;

        $usuario->identificador = $request->identificador;
        $usuario->usuario = $request->usuario;
        $usuario->password = Crypt::encryptString($request->contrasenia);

        $usuario->save();

    	return redirect('sistemas/accesos/vpn')->with('success','Se agrego correctamente el Usuarios '.$usuario->identificador);
    }
    



    public function modificar($id){

    	$usuario = UsuarioVPN::findOrFail($id);


    	$conexion = ConexionVPN::where('id','=',$usuario->conexion_id)->first();
        $conexiones = ConexionVPN::
            select('conexionesvpn.*','servidores.identificador as servidor')
            ->leftjoin('servidores','servidores.id','=','conexionesvpn.servidor_id')
            ->get()
        ;

        return view('sistemas.usuariovpn.modificar')
    		->with('usuario',$usuario)
    		->with('conexion',$conexion)
            ->with('conexiones',$conexiones)
            ->with('titulo','Informacion asosicada a '.$usuario->identificador);
    }

    public function actualizar(Request $request){

    	$validate = $request->validate([
            'id' => 'required',
            'conexion_id' => 'required',  
            'identificador' => 'required',
            'usuario' => 'required'
        ]);

        $usuario = UsuarioVPN::findOrFail($request->id);

        if($request->conexion_id == '-1')
            $usuario->conexion_id = null;
        else
            $usuario->conexion_id = $request->conexion_id;

        $usuario->identificador = $request->identificador;
        $usuario->usuario = $request->usuario;
    	
        if($request->has('contrasenia_confirmacion') && $request->has('contrasenia') && $request->contrasenia_confirmacion != null){
    		if($request->contrasenia_confirmacion == $request->contrasenia){
    			$usuario->password = Crypt::encryptString($request->contrasenia);
    		}else
    		{
    			return redirect()->back()->with('error','Las contraseñas no coinciden');
    		}
    	}
        
        $usuario->update();

        return redirect()->back()->with('success','Se actualizo correctamente el Usuarios '.$usuario->identificador);

    }

    public function eliminar(Request $request){
    	$validate = $request->validate([
    		'id' => 'required'
    	]);

    	$usuario = UsuarioVPN::findOrFail($request->id);
    	$usuario->delete();

    	return redirect('sistemas/accesos/vpn')->with('success','Se elimino correctamente el Usuario');

    }

}
