<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\ArchivoUsuarioDBMS;

use App\ConexionDBMS;
use App\UsuarioDBMS;
use App\Servidores;

use Illuminate\Support\Facades\Crypt;
use Maatwebsite\Excel\Facades\Excel;


class AccesosDBMSController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inicio(){

    	$usuarios = UsuarioDBMS::
            select('usuariodbms.*','conexiondbms.identificador as conexion')
            ->leftjoin('conexiondbms','conexiondbms.id','=','usuariodbms.dbms_id')
            ->get();
        ;

    	return view('sistemas.usuariodbms.index')
    		->with('titulo', 'Administracion de Usuario DBMS')
    		->with('usuarios',$usuarios)
    		;
    }

    public function cargar_csv(){
    	return view('sistemas.usuariodbms.cargar_csv')
    		->with('titulo','Cargar Usuarios DBMS desde un archivo.');
    }

    public function exportar_plantilla(){
	    	$export = new ArchivoUsuarioDBMS;
	    	return Excel::download($export, 'ejemplo.xlsx');

    }

    public function ver($id){

    	$acceso = UsuarioDBMS::findOrFail($id);
        $conexion = null;
        
        if($acceso->dbms_id != null){
            $conexion = ConexionDBMS::where('id','=',$acceso->dbms_id)->first();
        }

        $servidor = null;

        if($conexion != null){
            if($conexion->servidor_id != null){ 
                $servidor = Servidores::where('id','=',$conexion->servidor_id)->first();
            }
        }

        return view('sistemas.usuariodbms.ver')
            ->with('titulo', 'Ver los detalles de el usuario '.$acceso->identificador)
            ->with('acceso',$acceso)
            ->with('conexion',$conexion)
            ->with('servidor',$servidor)
            ;
    }

    public function nuevo(){

    	$conexiones = ConexionDBMS::
            select('conexiondbms.*','servidores.identificador as servidor')
            ->leftjoin('servidores','servidores.id','=','conexiondbms.servidor_id')
            ->get()
        ;

    	return view('sistemas.usuariodbms.nuevo')
    		->with('titulo', 'Añadir nuevo Usuario DBMS')
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

        $usuario = new UsuarioDBMS();

        if($request->conexion_id == '-1')
            $usuario->dbms_id = null;
        else
            $usuario->dbms_id = $request->conexion_id;

        $usuario->identificador = $request->identificador;
        $usuario->usuario = $request->usuario;
        $usuario->password = Crypt::encryptString($request->contrasenia);

        $usuario->save();

    	return redirect('sistemas/accesos/dbms')->with('success','Se agrego correctamente el Usuarios '.$usuario->identificador);
    }
    



    public function modificar($id){

    	$usuario = UsuarioDBMS::findOrFail($id);


    	$conexion = ConexionDBMS::where('id','=',$usuario->dbms_id)->first();
        $conexiones = ConexionDBMS::
            select('conexiondbms.*','servidores.identificador as servidor')
            ->leftjoin('servidores','servidores.id','=','conexiondbms.servidor_id')
            ->get()
        ;

        return view('sistemas.usuariodbms.modificar')
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

        $usuario = UsuarioDBMS::findOrFail($request->id);

        if($request->conexion_id == '-1')
            $usuario->dbms_id = null;
        else
            $usuario->dbms_id = $request->conexion_id;

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

    	$usuario = UsuarioDBMS::findOrFail($request->id);
    	$usuario->delete();

    	return redirect('sistemas/accesos/dbms')->with('success','Se elimino correctamente el Usuario');

    }

}
