<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ConexionFTP;
use App\Servidores;
use Illuminate\Support\Facades\Crypt;
use App\Exports\ArchivoFTP;
use Maatwebsite\Excel\Facades\Excel;
use App\UsuarioFTP;

class ConexionesFTPController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inicio(){

    	$conexiones = ConexionFTP::
            select('conexionesftp.*','servidores.identificador as server')
            ->leftjoin('servidores','servidores.id','=','conexionesftp.servidor_id')
            ->get();
        ;

    	return view('sistemas.ftp.index')
    		->with('titulo', 'Administracion de las conexiones FTP')
    		->with('conexiones',$conexiones)
    		;

    }

    public function cargar_csv(){

    	return view('sistemas.ftp.cargar_csv')
    		->with('titulo','Cargar conexiones FTP desde un archivo.');
    }

    public function exportar_plantilla(){

	    	$export = new ArchivoFTP;
	    	return Excel::download($export, 'ejemplo.xlsx');
    }


    public function nuevo(){

        $servidores = Servidores::all();

        return view('sistemas.ftp.nuevo')
            ->with('titulo','Nueva conexion FTP')
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

        $ftp = new ConexionFTP();

        if($request->servidor_id == '-1'){
            $ftp->servidor_id = null;
        }else
        {
            $ftp->servidor_id = $request->servidor_id;
        }

        $ftp->identificador = $request->identificador;
        $ftp->servidor = $request->servidor;
        $ftp->puerto = $request->puerto;

        $ftp->save();

        return redirect('sistemas/conexiones/ftp')->with('success','La conexion '.$ftp->identificador.' se añadio con exito');

    }


    public function modificar($id){

        $conexion = ConexionFTP::findOrFail($id);
        $servidor = Servidores::where('id','=',$conexion->servidor_id)->first();
        $servidores = Servidores::all();

        return view('sistemas.ftp.modificar')
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

        $ftp = ConexionFTP::findOrFail($request->id);

        if($request->servidor_id == '-1'){
            $ftp->servidor_id = null;
        }else
        {
            $ftp->servidor_id = $request->servidor_id;
        }

        $ftp->identificador = $request->identificador;
        $ftp->servidor = $request->servidor;
        $ftp->puerto = $request->puerto;

        $ftp->update();

        return redirect()->back()->with('success','La conexion '.$ftp->identificador.' se actualizo con exito');

    }


    public function eliminar(Request $request){
        $validate = $request->validate([
            'id' => 'required'
        ]);

        $conexion = ConexionFTP::findOrFail($request->id);

        if(UsuarioFTP::where('conexion_id','=',$conexion->id)->count() > 0){
            return redirect('sistemas/conexiones/ftp')->with('error','No se puedo eliminar la conexion; desasocie los usuarios de la conexion.');
        }else{
            $conexion->delete();
            return redirect('sistemas/conexiones/ftp')->with('success','La conexion se elimino con exito');
        }
    }


    public function ver($id){

        $conexion = ConexionFTP::findOrFail($id);
        $servidor = Servidores::where('id','=',$conexion->servidor_id)->first();

        $cuentas = UsuarioFTP::where('conexion_id','=',$conexion->id)->get();

        return view('sistemas.ftp.ver')
            ->with('titulo','Detalles de la conexion '.$conexion->identificador)
            ->with('conexion',$conexion)
            ->with('servidor',$servidor)
            ->with('cuentas',$cuentas)
            ;

    }
}
