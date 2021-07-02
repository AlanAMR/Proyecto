<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ConexionDBMS;
use App\UsuarioDBMS;
use Illuminate\Support\Facades\Crypt;
use App\Exports\ArchivoDBMS;
use Maatwebsite\Excel\Facades\Excel;

use App\Servidores;

class ConexionesDBMSController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inicio(){

    	$conexiones = ConexionDBMS::
            select('conexiondbms.*','servidores.identificador as server')
            ->leftjoin('servidores','servidores.id','=','conexiondbms.servidor_id')
            ->get();
        ;

    	return view('sistemas.dbms.index')
    		->with('titulo', 'Administracion de las conexiones DBMS')
    		->with('conexiones',$conexiones)
    		;

    }

    public function cargar_csv(){

    	return view('sistemas.dbms.cargar_csv')
    		->with('titulo','Cargar conexiones DBMS desde un archivo.');
    }

    public function exportar_plantilla(){

	    	$export = new ArchivoDBMS;
	    	return Excel::download($export, 'ejemplo.xlsx');
    }

    public function nuevo(){

        $servidores = Servidores::all();

        return view('sistemas.dbms.nuevo')
            ->with('titulo','Nueva conexion DBMS')
            ->with('servidores',$servidores)
            ;
    }


    public function crear(Request $request){

        $valdiate = $request->validate([
            'servidor_id' => 'required',
            'identificador' => 'required',
            'gestor' => 'required',
            'servidor' => 'required',
            'puerto' => 'required',
            'dataset' => 'required'
        ]);

        $dbms = new ConexionDBMS();

        if($request->servidor_id == '-1'){
            $dbms->servidor_id = null;
        }else
        {
            $dbms->servidor_id = $request->servidor_id;
        }

        $dbms->identificador = $request->identificador;
        $dbms->gestor_dbms = $request->gestor;
        $dbms->servidor = $request->servidor;
        $dbms->puerto = $request->puerto;
        $dbms->dataset = $request->dataset;

        $dbms->save();

        return redirect('sistemas/conexiones/dbms')->with('success','La conexion '.$dbms->identificador.' se añadio con exito');

    }


    public function modificar($id){

        $conexion = ConexionDBMS::findOrFail($id);
        $servidor = Servidores::where('id','=',$conexion->servidor_id)->first();
        $servidores = Servidores::all();

        return view('sistemas.dbms.modificar')
            ->with('titulo','Modificar la conexion '.$conexion->identificador)
            ->with('conexion',$conexion)
            ->with('servidor',$servidor)
            ->with('servidores',$servidores)
            ;
    }

    public function actualizar(Request $request){


        $valdiate = $request->validate([
            'id' => 'required',
            'servidor_id' => 'required',
            'identificador' => 'required',
            'gestor' => 'required',
            'servidor' => 'required',
            'puerto' => 'required',
            'dataset' => 'required'
        ]);

        $dbms = ConexionDBMS::findOrFail($request->id);

        if($request->servidor_id == '-1'){
            $dbms->servidor_id = null;
        }else
        {
            $dbms->servidor_id = $request->servidor_id;
        }

        $dbms->identificador = $request->identificador;
        $dbms->gestor_dbms = $request->gestor;
        $dbms->servidor = $request->servidor;
        $dbms->puerto = $request->puerto;
        $dbms->dataset = $request->dataset;

        $dbms->update();

        return redirect()->back()->with('success','La conexion '.$dbms->identificador.' se actualizo con exito');

    }


    public function eliminar(Request $request){
        $validate = $request->validate([
            'id' => 'required'
        ]);

        $conexion = ConexionDBMS::findOrFail($request->id);

        if(UsuarioDBMS::where('dbms_id','=',$conexion->id)->count() > 0){
            return redirect('sistemas/conexiones/dbms')->with('error','No se puedo eliminar la conexion; desasocie los usuarios de la conexion.');
        }else{
            $conexion->delete();
            return redirect('sistemas/conexiones/dbms')->with('success','La conexion se elimino con exito');
        }
    }


    public function ver($id){

        $conexion = Conexiondbms::findOrFail($id);
        $servidor = Servidores::where('id','=',$conexion->servidor_id)->first();

        $cuentas = UsuarioDBMS::where('dbms_id','=',$conexion->id)->get();
        
        return view('sistemas.dbms.ver')
            ->with('titulo','Detalles de la conexion '.$conexion->identificador)
            ->with('conexion',$conexion)
            ->with('servidor',$servidor)
            ->with('cuentas',$cuentas)
            ;

    }
}
