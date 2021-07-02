<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\ArchivoCarpetas;
use App\Exports\ArchivoCarpetasUsuarios;

use App\ConexionSMB;

use Illuminate\Support\Facades\Crypt;
use Maatwebsite\Excel\Facades\Excel;

use App\Carpetas;
use App\CarpetasUsuarios;
use App\Servidores;
use App\Empleados;
use App\UsuarioRAS;

use DB;
use Exeption;
class AccesosSMBController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inicio(){

    	$carpetas = Carpetas::
            select('carpetas.*','conexionessmb.identificador as conexion')
            ->leftjoin('conexionessmb','conexionessmb.id','=','carpetas.conexion_id')
            ->get()
            ;

    	return view('sistemas.carpetas.index')
    		->with('titulo', 'Administracion de Carpetas Compartidas')
    		->with('carpetas',$carpetas)
    		;
    }

    public function cargar_csv(){
    	return view('sistemas.carpetas.cargar_csv')
    		->with('titulo','Cargar carpetas compartidas desde un archivo.');
    }

    public function exportar_plantilla(){
	    	$export = new ArchivoCarpetas;
	    	return Excel::download($export, 'ejemplo.xlsx');
    }

    public function exportar_plantilla_usuarios(){
            $export = new ArchivoCarpetasUsuarios;
            return Excel::download($export, 'ejemplo.xlsx');
    }

    public function ver($id){

        $carpeta = Carpetas::findOrFail($id);
        $servidor = Servidores::where('id','=',$carpeta->servidor_id)->first();
        $conexion = ConexionSMB::where('id','=',$carpeta->conexion_id)->first();
        $usuarios = CarpetasUsuarios::
            select('usuarioras.usuario as usuarioras','usuarioras.password as passwordras','empleado.nombre as empleado', 'carpetasusuarios.*')
            ->leftjoin('usuarioras','usuarioras.id','=','carpetasusuarios.usuarioras_id')
            ->leftjoin('empleado','empleado.id','=','carpetasusuarios.empleado_id')
            ->where('carpetasusuarios.carpeta_id','=',$carpeta->id)
            ->get();
        
        return view('sistemas.carpetas.ver')
            ->with('usuarios',$usuarios)
            ->with('servidor',$servidor)
            ->with('carpeta',$carpeta)
            ->with('conexion')
            ->with('titulo','Detalles de la carpeta '.$carpeta->identificador)
        ;

    }

    public function nuevo(){

    	$conexiones = ConexionSMB::
            select('conexionessmb.*','servidores.identificador as servidor')
            ->leftjoin('servidores','servidores.id','=','conexionessmb.servidor_id')
            ->get()
            ;


        $usuarioras = UsuarioRAS::all();
        $empleados = Empleados::all();

    	return view('sistemas.carpetas.nuevo')
    		->with('titulo', 'Añadir nueva carpeta')
    		->with('conexiones',$conexiones)
            ->with('usuarioras',$usuarioras)
            ->with('empleados',$empleados)
    		;
    }

    public function crear(Request $request){

    	$validate = $request->validate([
    		'conexion_id' => 'required',  
    		'identificador' => 'required',
    		'ruta' => 'required'
    	]);

        DB::beginTransaction();

        try{
            $carpeta = new Carpetas();

            if($request->conexion_id == '-1'){
                $carpeta->conexion_id = null;
            }else{
                $carpeta->conexion_id = $request->conexion_id;
            }
            $carpeta->identificador = $request->identificador;
            $carpeta->ruta = $request->ruta;

            $carpeta->save();


            if($request->has('empleados')){
            
                    $empleados = $request->empleados;
                    $usuarios = $request->usuarios;
                    $permisos = $request->permisos;

                    $x=0;

                    foreach ($empleados as $empleado) {
                        // Crear el registro
                        $carpetasusuarios = new CarpetasUsuarios();

                        $carpetasusuarios->carpeta_id = $carpeta->id;

                        $usuarioval = explode("|", $usuarios[$x]);
                        $empleadoval = explode("|", $empleados[$x]);

                        if($usuarioval[0] == '-1'){
                            $carpetasusuarios->usuarioras_id = null;
                        }else{
                            $carpetasusuarios->usuarioras_id = $usuarioval[0];
                        }

                        if($empleadoval[0] == '-1'){
                            $carpetasusuarios->empleado_id = null;
                        }else{
                            $carpetasusuarios->empleado_id = $empleadoval[0];
                        }

                        $carpetasusuarios->permisos = $permisos[$x];

                        $carpetasusuarios->save();
                        
                        $x++;
                    }

                }


            DB::commit();
        }
        catch(Exception $ex){
            DB::rollBack();
            return redirect()->back()->withInput(Input::all())->with('error','Error: '.$ex);
        }


    	return redirect('sistemas/accesos/carpetas')->with('success','Se agrego correctamente la Carpeta '.$carpeta->identificador);
    }
    



    public function modificar($id){

        $carpeta = Carpetas::findOrFail($id);
        $conexion = ConexionSMB::where('id','=',$carpeta->conexion_id)->first();
        $carpetausuarios  = CarpetasUsuarios::
        select('usuarioras.usuario as usuario','empleado.nombre as empleado', 'carpetasusuarios.*')
        ->leftjoin('usuarioras','usuarioras.id','=','carpetasusuarios.usuarioras_id')
        ->leftjoin('empleado','empleado.id','=','carpetasusuarios.empleado_id')
        ->where('carpetasusuarios.carpeta_id','=',$carpeta->id)
        ->get();

    	$conexiones = ConexionSMB::
            select('conexionessmb.*','servidores.identificador as servidor')
            ->leftjoin('servidores','servidores.id','=','conexionessmb.servidor_id')
            ->get()
            ;
        $usuarioras = UsuarioRAS::all();
        $empleados = Empleados::all();

        return view('sistemas.carpetas.modificar')
            ->with('titulo', 'Modifcar la carpeta '.$carpeta->identificador)
            ->with('conexiones',$conexiones)
            ->with('usuarioras',$usuarioras)
            ->with('empleados',$empleados)
            ->with('carpeta',$carpeta)
            ->with('conexion',$conexion)
            ->with('carpetasusuarios',$carpetausuarios)
            ;
    }

    public function actualizar(Request $request){

    	$validate = $request->validate([
            'id' => 'required',
            'conexion_id' => 'required',  
            'identificador' => 'required',
            'ruta' => 'required'
        ]);

        DB::beginTransaction();

        try{
            $carpeta = Carpetas::findOrFail($request->id);

            if($request->conexion_id == '-1'){
                $carpeta->conexion_id = null;
            }else{
                $carpeta->conexion_id = $request->conexion_id;
            }
            $carpeta->identificador = $request->identificador;
            $carpeta->ruta = $request->ruta;

            $carpeta->update();

            $todelete = CarpetasUsuarios::where('carpeta_id','=',$carpeta->id)->delete();

            if($request->has('empleados')){
            
                    $empleados = $request->empleados;
                    $usuarios = $request->usuarios;
                    $permisos = $request->permisos;

                    $x=0;

                    foreach ($empleados as $empleado) {
                        // Crear el registro
                        $carpetasusuarios = new CarpetasUsuarios();

                        $carpetasusuarios->carpeta_id = $carpeta->id;

                        $usuarioval = explode("|", $usuarios[$x]);
                        $empleadoval = explode("|", $empleados[$x]);

                        if($usuarioval[0] == '-1'){
                            $carpetasusuarios->usuarioras_id = null;
                        }else{
                            $carpetasusuarios->usuarioras_id = $usuarioval[0];
                        }

                        if($empleadoval[0] == '-1'){
                            $carpetasusuarios->empleado_id = null;
                        }else{
                            $carpetasusuarios->empleado_id = $empleadoval[0];
                        }

                        $carpetasusuarios->permisos = $permisos[$x];

                        $carpetasusuarios->save();
                        
                        $x++;
                    }

                }


            DB::commit();
        }
        catch(Exception $ex){
            DB::rollBack();
            return redirect()->back()->withInput(Input::all())->with('error','Error: '.$ex);
        }


        return redirect()->back()->with('success','Se actualizo correctamente la Carpeta '.$carpeta->identificador);

    }

    public function eliminar(Request $request){
    	$validate = $request->validate([
    		'id' => 'required'
    	]);
    	$carpeta = Carpetas::findOrFail($request->id);

        if(CarpetasUsuarios::where('carpeta_id','=',$carpeta->id)->count() > 0){
            return redirect('sistemas/accesos/carpetas')->with('error','Desasocie los empleados / usuarios antes de eliminar la carpeta.');
        }
        
        $carpeta->delete();

    	return redirect('sistemas/accesos/carpetas')->with('success','Se elimino correctamente la carpeta.');

    }

}
