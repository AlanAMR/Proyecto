<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Response;
use Session;
use File;


use App\user;
use App\InfoUsuarios;

use App\Responsivas;
use App\ResponsivasEstados;
use App\ResponsivasInsumos;
use App\ResponsivasArchivos;
use App\TiposResponsivasArchivos;


use App\Laptops;
use App\Celulares;
use App\Chips;

use Illuminate\Support\Facades\Storage;


class ResponsivasController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Devuelve la vista inicial de la seccion de responsivas
    public function inicio(){

    	$titulo = "Responsivas";

        $responsivas = Responsivas::
                        select('responsivas.id as id','user_aut.name as autoriza','user_ent.name as entrega','user_sol.name as solicita','responsivas.created_at as fecha','responsivas_estados.valor as estado')
                        ->join('users as user_aut','user_aut.id','=','responsivas.usuario_autoriza')
                        ->join('users as user_ent','user_ent.id','=','responsivas.usuario_entrega')
                        ->join('users as user_sol','user_sol.id','=','responsivas.usuario_solicita')
                        ->join('responsivas_estados','responsivas_estados.id','=','responsivas.status')
                        ->where('responsivas.status','!=','0')
                        ->get();

        $responsivasestados = Responsivasestados::all();

        return view('responsivas.index')
        	->with('titulo',$titulo)
        	->with('responsivas',$responsivas)
        	->with('responsivasestados',$responsivasestados);
        

    }

    // Devuelve una vista con todos los datos de una responsiva.  
    public function ver($id){

        
        $responsiva = Responsivas::findOrFail($id);
        $titulo = "Responsiva: ".$id. " // Creado:".$responsiva->created_at." // Ultima modificacion: ".$responsiva->updated_at;

        $autoriza = User::findOrFail($responsiva->usuario_autoriza);
        $entrega = User::findOrFail($responsiva->usuario_entrega);
        $solicita = User::findOrFail($responsiva->usuario_solicita);

        $responsivaestado = Responsivasestados::findOrFail($responsiva->status);

        $responsivasInsumos = ResponsivasInsumos::
        	select('responsivas_insumos.id as id','responsivas_movimientos.valor as movimiento','tipos_insumos.valor as tipo_insumo','responsivas_insumos.insumo_id as insumo_id')
        	->join('responsivas_movimientos','responsivas_movimientos.id','=','responsivas_insumos.responsiva_movimiento_id')
        	->join('tipos_insumos','responsivas_insumos.tipo_insumo_id','=','tipos_insumos.id')
        	->where('responsiva_id','=',$responsiva->id)
        	->get();

        foreach ($responsivasInsumos as $insumo) {

        	switch ($insumo->tipo_insumo) {
        		case 'Laptop':
        				$insumo->item = Laptops::findOrFail($insumo->insumo_id) ;
        			break;

        		case 'Celular':
        				$insumo->item = Celulares::findOrFail($insumo->insumo_id) ;
        			break;

        		case 'Chip':
        				$insumo->item = Chips::findOrFail($insumo->insumo_id) ;
        			break;
        		
        		case 'Monitor':
        				$insumo->item = Accesorios::findOrFail($insumo->insumo_id) ;
        			break;

        		case 'Accesorio':
        				$insumo->item = Accesorios::findOrFail($insumo->insumo_id) ;
        			break;

        		default:
        			$insumo->item = [];
        			break;
        	}
        }


        $archivos = ResponsivasArchivos::
            select('responsivas_archivos.*','tipo.valor as tipo','responsivas_archivos.tipo as tipo_id')
            ->join('tipos_responsivas_archivos as tipo','tipo.id','=','responsivas_archivos.tipo')
            ->where('responsivas_archivos.responsiva_id','=',$id)
            ->get();

        $tipos = TiposResponsivasArchivos::
            where('id','!=','1')
            ->get();

        return view('responsivas.ver')
        	->with('titulo',$titulo)
        	->with('responsiva', $responsiva)
        	->with('responsivaestado', $responsivaestado)
        	->with('autoriza', $autoriza)
        	->with('entrega', $entrega)
        	->with('solicita', $solicita)
        	->with('responsivasinsumos', $responsivasInsumos)
            ->with('archivos',$archivos)
            ->with('tipos_archivos',$tipos)
            ;
    }

    public function nuevo ()
    {	

    	
    	$laptops_asig = Laptops::where('status','=','1')->get();
        $laptops_ret = Laptops::where('status','=','2')->get();
    	$celulares_asig = Celulares::where('status','=','1')->get();
        $celulares_ret = Celulares::where('status','=','2')->get();

        $chips_asig = Chips::where('status','=','1')->get();
        $chips_ret = Chips::where('status','=','2')->get();
    	$usuarios_solicitan = user::all();

    	$usuarios_entregan = user::
    		select('users.*')
    		->join('usuarios_entregas_responsivas as ent','ent.user_id','=','users.id')
    		->get();
    	
    	$usuarios_autorizan = user::
    		select('users.*')
    		->join('usuarios_autorizan_responsivas as aut','aut.user_id','=','users.id')
    		->get();

    	return view('responsivas.nuevo')
    		->with('titulo','Nueva Responsiva')
    		->with('laptops_asig',$laptops_asig)
            ->with('laptops_ret',$laptops_ret)
    		->with('celulares_asig',$celulares_asig)
            ->with('celulares_ret',$celulares_ret)
            ->with('chips_asig',$chips_asig)
            ->with('chips_ret',$chips_ret)
    		->with('usuarios_solicitan',$usuarios_solicitan)
    		->with('usuarios_entregan',$usuarios_entregan)
    		->with('usuarios_autorizan',$usuarios_autorizan)
    	;
    	
    }	

    public function crear (Request $request)
    {

    	$validated = $request->validate([
    		'solicitante' => 'required',
    		'autoriza' => 'required',
    		'entrega' => 'required'
    	]);

    	if($request->solicitante == $request->autoriza){
			return redirect()->back()->with('error','La persona que solicita y la que autoriza deben ser diferentes!');    		
    	}

    	//incia la transaccion.
    	DB::beginTransaction();

    	//incializamos la bandera que valora si realizamos la transaccion
		$operacion = false;

        // variables que le pasaremos a la vista al momento de generar el pdf,
        // solo se llenan si se realiza la responsiva/equipo correspondiente
        $asig_laptop = null;
        $ret_laptop = null;
        $ret_celular = null;
        $asig_celular = null;

        $asig_chip = null;
        $ret_chip = null;
		
		try{
			$responsiva = new Responsivas();


			$usuario_solicita = explode("|", $request->solicitante);
			$usuario_autoriza = explode("|", $request->autoriza);
			$usuario_entrega = explode("|", $request->entrega);

			$responsiva->usuario_solicita = $usuario_solicita[0];
			$responsiva->usuario_autoriza = $usuario_autoriza[0];
			$responsiva->usuario_entrega = $usuario_entrega[0];
			$responsiva->status = 1;
			$responsiva->save();
 


	    	if($request->asignar_laptop != null){


				$exploded = explode("|", $request->asignar_laptop);
				$id_asignar_laptop = $exploded[0];

	 			$resins = new ResponsivasInsumos();
	 			$resins->responsiva_id = $responsiva->id;
	 			$resins->responsiva_movimiento_id = 1;
	 			$resins->tipo_insumo_id = 1;
	 			$resins->insumo_id = $id_asignar_laptop;
                if(isset($request->asignar_laptop_condiciones))
	 			   $resins->comentarios = $request->asignar_laptop_condiciones;
                else
                    $resins->comentarios = "";

	 			$resins->save();

                $asig_laptop = Laptops::findOrFail($id_asignar_laptop);

	    		$operacion = true;
	    	}

	    	if($request->retirar_laptop != null){

	    		$exploded = explode("|", $request->retirar_laptop);
				$id_retirar_laptop = $exploded[0];

	 			$resins = new ResponsivasInsumos();
	 			$resins->responsiva_id = $responsiva->id;
	 			$resins->responsiva_movimiento_id = 2;  		
	 			$resins->tipo_insumo_id = 1;
	 			$resins->insumo_id = $id_retirar_laptop;

                if(isset($request->retirar_laptop_condiciones))
                   $resins->comentarios = $request->retirar_laptop_condiciones;
                else
                    $resins->comentarios = "";


	 			$resins->save();
                
                $ret_laptop = Laptops::findOrFail($id_retirar_laptop);

	    		$operacion = true;
	    	}

	    	if($request->asignar_celular != null){
                
                $exploded = explode("|", $request->asignar_celular);
                $id_asignar_celular = $exploded[0];

                $resins = new ResponsivasInsumos();
                $resins->responsiva_id = $responsiva->id;
                $resins->responsiva_movimiento_id = 1;
                $resins->tipo_insumo_id = 2;
                $resins->insumo_id = $id_asignar_celular;
                
                if(isset($request->asignar_celular_condiciones))
                   $resins->comentarios = $request->asignar_celular_condiciones;
                else
                    $resins->comentarios = "";

                $resins->save();

                $asig_celular = Celulares::findOrFail($id_asignar_celular);

	    		$operacion = true;
	    	}

	    	if($request->retirar_celular != null){

                $exploded = explode("|", $request->retirar_celular);
                $id_retirar_celular = $exploded[0];

                $resins = new ResponsivasInsumos();
                $resins->responsiva_id = $responsiva->id;
                $resins->responsiva_movimiento_id = 2;
                $resins->tipo_insumo_id = 2;
                $resins->insumo_id = $id_retirar_celular;
                if(isset($request->retirar_celular_condiciones))
                   $resins->comentarios = $request->retirar_celular_condiciones;
                else
                    $resins->comentarios = "";

                $resins->save();

                $ret_celular = Celulares::findOrFail($id_retirar_celular);

	    		$operacion = true;
	    	}


            if($request->asignar_celular_chip){

                $exploded = explode("|", $request->asignar_celular_chip);
                $id_asig_chip = $exploded[0];

                $resins = new ResponsivasInsumos();
                $resins->responsiva_id = $responsiva->id;
                $resins->responsiva_movimiento_id = 1;
                $resins->tipo_insumo_id = 3;
                $resins->insumo_id = $id_asig_chip;
                $resins->comentarios = "";

                $resins->save();

                $asig_chip = Chips::findOrFail($id_asig_chip);
            }


            if($request->retirar_celular_chip){

                $exploded = explode("|", $request->retirar_celular_chip);
                $id_ret_chip = $exploded[0];

                $resins = new ResponsivasInsumos();
                $resins->responsiva_id = $responsiva->id;
                $resins->responsiva_movimiento_id = 2;
                $resins->tipo_insumo_id = 3;
                $resins->insumo_id = $id_ret_chip;
                $resins->comentarios = "";

                $resins->save();

                $ret_chip = Chips::findOrFail($id_ret_chip);
            }

            
			// Creacion del PDF	        
            $mpdf = new \Mpdf\Mpdf([
                'mode' => 'utf-8', 
                'format' => 'A4-P' , //190 * 236
                'margin_left' => '2',
                'margin_right' => '2',
                'margin_top' => '2',
                ]);

            $fecha = date("m/d/Y H:i:s");

            $info_usuario = InfoUsuarios::findOrFail($usuario_solicita[0]);
            
            //vista auxiliar para la creacion del pdf
            $vista = view('responsivas.templatepdf')
                ->with('fecha',$fecha)
                ->with('asig_laptop',$asig_laptop)
                ->with('ret_laptop',$ret_laptop)
                ->with('asig_celular',$asig_celular)
                ->with('ret_celular',$ret_celular)

                ->with('asig_chip',$asig_chip)
                ->with('ret_chip',$ret_chip)

                ->with('info_usuario',$info_usuario)
                ->with('solicita',$usuario_solicita[1])
                ->with('autoriza',$usuario_autoriza[1])
                ->with('entrega',$usuario_entrega[1])
                ->with('request',$request)
            ;

            $mpdf->WriteHTML($vista);

	        $path = 'responsivas/'.$usuario_solicita[1];

            $nomarch = 'responsiva-'.$usuario_solicita[1].' '.date("m-d-Y H-i-s").'.pdf';
	        if(!File::exists(public_path().'/'.$path)) {
				mkdir(public_path().'/'.$path, 0755, true);
			}
			$usuario_solicita = explode("|", $request->solicitante);
	        $mpdf->Output(public_path().'/'.$path.'/'.$nomarch, 'F');

            $respach = new ResponsivasArchivos();

            $respach->responsiva_id = $responsiva->id;
            $respach->tipo = 1;
            $respach->ruta = $path;
            $respach->nombre = $nomarch;

            $respach->save();

            if($asig_laptop != null){
                $asig_laptop->status = 2;
                $asig_laptop->update();
            }

            if($ret_laptop != null){
                $ret_laptop->status = 1;
                $ret_laptop->update();
            }

            if($asig_celular != null){
                $asig_celular->status = 2;
                $asig_celular->update();
            }

            if($ret_celular != null){
                $ret_celular->status = 1;
                $ret_celular->update();
            }

            if($asig_chip != null){
                $asig_chip->status = 2;
                $asig_chip->update();
            }

            if($ret_chip != null){
                $ret_chip->status = 1;
                $ret_chip->update();
            }


	       } catch(Exeption $ex){
			// Cualquier error, abortamos la transaccion
		    DB::rollback();
	       }
		

			// Si no hay ningun movimiento, abortamos la transaccion.
    	if(!$operacion){
    		DB::rollback();
    		return redirect()->back()->with('error','La Responsiva debe tener por lo menos un movimiento.');
    	}

    	// Todo salio bien, entonces realizamos la transaccion
		DB::commit();

        return redirect('almacen/responsivas')->with('success','Responsiva Generada con exito!');

    }

    public function modificar ($id)
    {
    	
    }

    public function actualizar ()
    {
    	
    }

    public function eliminar ()
    {
    	
    }

    public function verpdf ($id)
    {
        $responsiva = Responsivas::findOrFail($id);
    	$archivo = ResponsivasArchivos::
            where('responsivas_archivos.responsiva_id','=',$responsiva->id)
            ->where('responsivas_archivos.tipo','=','1')
            ->first()
        ;

        if($archivo == null)
            return redirect()->back()->with('error','No se pudo encontrar el archivo!');
    	
    	return view('responsivas.verpdf')
    		->with('archivo',$archivo)
    	; 	
    }

    public function descargarpdf ($id)
    {
        $responsiva = Responsivas::findOrFail($id);

        $archivo = ResponsivasArchivos::
            where('responsivas_archivos.responsiva_id','=',$responsiva->id)
            ->where('responsivas_archivos.tipo','=','1')
            ->first()
        ;

        if($archivo == null)
            return redirect()->back()->with('error','No se pudo encontrar el archivo!');


    	$file = asset($archivo->ruta.'/'.$archivo->nombre);


		$headers = array(
		          'Content-Type: application/pdf',
		        );

		return Response::download($file, $archivo->nombre , $headers);
    }

    public function anadirestado (Request $request)
    {
    	$validated = $request->validate([
    		'valor' => 'required'
    	]);

    	$estado = New Responsivasestados();

    	$estado->valor = $request->valor;

    	$estado->save();

    	return redirect()->back()->with('success','Creado el estado '.$estado->valor.'!');
    }

    public function eliminararchivo(Request $request){

        $validated = $request->validate([
            'id' => 'required'
        ]);

        $archivo = ResponsivasArchivos::findOrFail($request->id);

        $ruta = $archivo->ruta.'/'.$archivo->nombre;
        
        if(File::exists($ruta)){
            File::delete($ruta);
            $archivo->delete();
            return redirect()->back()->with('success','Se elimino el archivo con exito !');
        }else{
            return redirect()->back()->with('error','No se pudo eliminar el archivo!');
        }

    }

    public function subirarchivo(Request $request){

        $validated = $request->validate([
            'id' => 'required',
            'file' => 'required',
            'username' => 'required',
            'tipo' => 'required'
        ]);

        try{
            
            $responsiva = Responsivas::findOrFail($request->id);

            $path = 'responsivas/'.$request->username;

            if(!File::exists(public_path().'/'.$path)) {
                mkdir(public_path().'/'.$path, 0755, true);
            }

            $file = $request->file('file');

            $file->move($path,$file->getClientOriginalName());

            $respach = new ResponsivasArchivos();

            $respach->responsiva_id = $responsiva->id;
            $respach->tipo = $request->tipo;
            $respach->ruta = $path;
            $respach->nombre = $file->getClientOriginalName();

            $respach->save();

            return redirect()->back()->with('success','Se cargo correctamente el archivo!');

        }
        catch(Exceptio $ex){
            return redirect()->back()->with('error','No se pudo cargar el archivo!');
        }

    }
}
