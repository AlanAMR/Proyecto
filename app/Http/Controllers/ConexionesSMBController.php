<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ConexionSMB;

use Illuminate\Support\Facades\Crypt;
use App\Exports\ArchivoSMB;
use Maatwebsite\Excel\Facades\Excel;

use App\Servidores;
use App\Carpetas;
class ConexionesSMBController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inicio(){

    	$conexiones = ConexionSMB::
            select('conexionessmb.*','servidores.identificador as server')
            ->leftjoin('servidores','servidores.id','=','conexionessmb.servidor_id')
            ->get();
        ;

    	return view('sistemas.smb.index')
    		->with('titulo', 'Administracion de las conexiones SMB / CIFS')
    		->with('conexiones',$conexiones)
    		;

    }

    public function cargar_csv(){

    	return view('sistemas.smb.cargar_csv')
    		->with('titulo','Cargar conexiones SMB / CIFS desde un archivo.');
    }

    public function exportar_plantilla(){

	    	$export = new ArchivoSMB;
	    	return Excel::download($export, 'ejemplo.xlsx');
    }


    public function nuevo(){

        $servidores = Servidores::all();

        return view('sistemas.smb.nuevo')
            ->with('titulo','Nueva conexion SMB')
            ->with('servidores',$servidores)
            ;
    }


    public function crear(Request $request){

        $valdiate = $request->validate([
            'servidor_id' => 'required',
            'identificador' => 'required',
            'servidor' => 'required',
            'puerto' => 'required'
        ]);

        $smb = new ConexionSMB();

        if($request->servidor_id == '-1'){
            $smb->servidor_id = null;
        }else
        {
            $smb->servidor_id = $request->servidor_id;
        }

        $smb->identificador = $request->identificador;
        $smb->servidor = $request->servidor;
        $smb->puerto = $request->puerto;

        $smb->save();

        return redirect('sistemas/conexiones/smb')->with('success','La conexion '.$smb->identificador.' se añadio con exito');

    }


    public function modificar($id){

        $conexion = ConexionSMB::findOrFail($id);
        $servidor = Servidores::where('id','=',$conexion->servidor_id)->first();
        $servidores = Servidores::all();

        return view('sistemas.smb.modificar')
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
            'puerto' => 'required'
        ]);

        $smb = ConexionSMB::findOrFail($request->id);

        if($request->servidor_id == '-1'){
            $smb->servidor_id = null;
        }else
        {
            $smb->servidor_id = $request->servidor_id;
        }

        $smb->identificador = $request->identificador;
        $smb->servidor = $request->servidor;
        $smb->puerto = $request->puerto;

        $smb->update();

        return redirect()->back()->with('success','La conexion '.$smb->identificador.' se actualizo con exito');

    }


    public function eliminar(Request $request){
        $validate = $request->validate([
            'id' => 'required'
        ]);

        $conexion = ConexionSMB::findOrFail($request->id);

        if(Carpetas::where('conexion_id','=',$conexion->id)->count() > 0){
            return redirect('sistemas/conexiones/smb')->with('error','Desasocie las carpetas con la conexion para poder eliminar la conexion.');
        }else
        {
            $conexion->delete();
        }
        
        return redirect('sistemas/conexiones/smb')->with('success','La conexion se elimino con exito');
    }


    public function ver($id){

        $conexion = ConexionSMB::findOrFail($id);
        $servidor = Servidores::where('id','=',$conexion->servidor_id)->first();

        $cuentas = Carpetas::where('conexion_id','=',$conexion->id)->get();

        return view('sistemas.smb.ver')
            ->with('titulo','Detalles de la conexion '.$conexion->identificador)
            ->with('conexion',$conexion)
            ->with('servidor',$servidor)
            ->with('cuentas',$cuentas)
            ;

    }
}
