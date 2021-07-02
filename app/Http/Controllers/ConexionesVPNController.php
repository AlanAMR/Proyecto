<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Crypt;
use App\Exports\ArchivoVPN;
use Maatwebsite\Excel\Facades\Excel;

use App\ConexionVPN;
use App\Servidores;

use App\UsuarioVPN;

class ConexionesVPNController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inicio(){

    	$conexiones = ConexionVPN::
            select('conexionesvpn.*','servidores.identificador as server')
            ->leftjoin('servidores','servidores.id','=','conexionesvpn.servidor_id')
            ->get();
        ;

    	return view('sistemas.vpn.index')
    		->with('titulo', 'Administracion de las conexiones VPN')
    		->with('conexiones',$conexiones)
    		;

    }

    public function ver($id){

        $conexion = ConexionVPN::findOrFail($id);
        $servidor = Servidores::where('id','=',$conexion->servidor_id)->first();
        $usuarios = UsuarioVPN::where('conexion_id','=',$conexion->id)->get();


        return view('sistemas.vpn.ver')
            ->with('titulo','Detalles de la conexion '.$conexion->identificador)
            ->with('conexion',$conexion)
            ->with('servidor',$servidor)
            ->with('cuentas',$usuarios)
            ;
    }

    public function cargar_csv(){

    	return view('sistemas.vpn.cargar_csv')
    		->with('titulo','Cargar conexiones VPN desde un archivo.');
    }

    public function exportar_plantilla(){

	    	$export = new ArchivoVPN;
	    	return Excel::download($export, 'ejemplo.xlsx');
    }

    public function nuevo(){

        $servidores = Servidores::all();

        return view('sistemas.vpn.nuevo')
            ->with('titulo','Nueva conexion VPN')
            ->with('servidores',$servidores)
            ;
    }


    public function crear(Request $request){

        $valdiate = $request->validate([
            'servidor_id' => 'required',
            'identificador' => 'required',
            'servidor' => 'required',
            'puerto' => 'required',
            'cifrado' => 'required'
        ]);

        $vpn = new ConexionVPN();

        if($request->servidor_id == '-1'){
            $vpn->servidor_id = null;
        }else
        {
            $vpn->servidor_id = $request->servidor_id;
        }

        $vpn->identificador = $request->identificador;
        $vpn->servidor = $request->servidor;
        $vpn->puerto = $request->puerto;
        $vpn->cifrado = $request->cifrado;

        $vpn->save();

        return redirect('sistemas/conexiones/vpn')->with('success','La conexion '.$vpn->identificador.' se añadio con exito');

    }

    public function eliminar(Request $request){
    	$validate = $request->validate([
    		'id' => 'required'
    	]);

    	$vpn = ConexionVPN::findOrFail($request->id);


        if(UsuarioVPN::where('conexion_id','=',$vpn->id)->count() > 0){
            return redirect('sistemas/conexiones/vpn')->with('error','No se puedo eliminar la conexion; desasocie los usuarios de la conexion.');
        }else{
        	$vpn->delete();
        	return redirect('sistemas/conexiones/vpn')->with('success','La conexion se elimino con exito');
        }


        
    }

    public function modificar($id){

        $conexion = ConexionVPN::findOrFail($id);
        $servidor = Servidores::where('id','=',$conexion->servidor_id)->first();
        $servidores = Servidores::all();

        return view('sistemas.vpn.modificar')
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
            'puerto' => 'required',
            'cifrado' => 'required'
        ]);

        $vpn = ConexionVPN::findOrFail($request->id);

        if($request->servidor_id == '-1'){
            $vpn->servidor_id = null;
        }else
        {
            $vpn->servidor_id = $request->servidor_id;
        }

        $vpn->identificador = $request->identificador;
        $vpn->servidor = $request->servidor;
        $vpn->puerto = $request->puerto;
        $vpn->cifrado = $request->cifrado;

        $vpn->update();


        return redirect()->back()->with('success','La conexion '.$vpn->identificador.' se actualizo con exito');

    }
}
