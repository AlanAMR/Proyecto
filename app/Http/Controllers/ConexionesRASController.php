<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ConexionRAS;
use App\Servidores;
use Illuminate\Support\Facades\Crypt;
use App\Exports\ArchivoRAS;
use Maatwebsite\Excel\Facades\Excel;
use App\UsuarioRAS;
class ConexionesRASController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inicio(){

    	$conexiones = ConexionRAS::
            select('conexionesras.*','servidores.identificador as server')
            ->leftjoin('servidores','servidores.id','=','conexionesras.servidor_id')
            ->get();
        ;

    	return view('sistemas.ras.index')
    		->with('titulo', 'Administracion de las conexiones RAS / RDP / SSH')
    		->with('conexiones',$conexiones)
    		;

    }

    public function cargar_csv(){

    	return view('sistemas.ras.cargar_csv')
    		->with('titulo','Cargar conexiones RAS / RDP / SSH desde un archivo.');
    }

    public function exportar_plantilla(){

	    	$export = new ArchivoRAS;
	    	return Excel::download($export, 'ejemplo.xlsx');
    }


    public function nuevo(){

        $servidores = Servidores::all();

        return view('sistemas.ras.nuevo')
            ->with('titulo','Nueva conexion RAS / RDP / SSH')
            ->with('servidores',$servidores)
            ;
    }


    public function crear(Request $request){

        $valdiate = $request->validate([
            'servidor_id' => 'required',
            'identificador' => 'required',
            'servidor' => 'required',
            'tipo' => 'required',
            'puerto' => 'required'
        ]);

        $ras = new ConexionRAS();

        if($request->servidor_id == '-1'){
            $ras->servidor_id = null;
        }else
        {
            $ras->servidor_id = $request->servidor_id;
        }

        $ras->identificador = $request->identificador;
        $ras->servidor = $request->servidor;
        $ras->tipo = $request->tipo;
        $ras->puerto = $request->puerto;

        $ras->save();

        return redirect('sistemas/conexiones/ras')->with('success','La conexion '.$ras->identificador.' se añadio con exito');

    }


    public function modificar($id){

        $conexion = ConexionRAS::findOrFail($id);
        $servidor = Servidores::where('id','=',$conexion->servidor_id)->first();
        $servidores = Servidores::all();

        return view('sistemas.ras.modificar')
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
            'servidor' => 'required',
            'tipo' => 'required',
            'puerto' => 'required'
        ]);

        $ras = ConexionRAS::findOrFail($request->id);

        if($request->servidor_id == '-1'){
            $ras->servidor_id = null;
        }else
        {
            $ras->servidor_id = $request->servidor_id;
        }

        $ras->identificador = $request->identificador;
        $ras->servidor = $request->servidor;
        $ras->tipo = $request->tipo;
        $ras->puerto = $request->puerto;

        $ras->save();

        return redirect()->back()->with('success','La conexion '.$ras->identificador.' se actualizo con exito');

    }


    public function eliminar(Request $request){
        $validate = $request->validate([
            'id' => 'required'
        ]);

        $conexion = ConexionRAS::findOrFail($request->id);

        if(UsuarioRAS::where('conexion_id','=',$conexion->id)->count() > 0){
            return redirect('sistemas/conexiones/ras')->with('error','No se puedo eliminar la conexion; desasocie los usuarios de la conexion.');
        }else{
            $conexion->delete();
            return redirect('sistemas/conexiones/ras')->with('success','La conexion se elimino con exito');
        }
    }


    public function ver($id){

        $conexion = ConexionRAS::findOrFail($id);
        $servidor = Servidores::where('id','=',$conexion->servidor_id)->first();

        $cuentas = UsuarioRAS::where('conexion_id','=',$conexion->id)->get();

        return view('sistemas.ras.ver')
            ->with('titulo','Detalles de la conexion '.$conexion->identificador)
            ->with('conexion',$conexion)
            ->with('servidor',$servidor)
            ->with('cuentas',$cuentas)
            ;

    }
}
