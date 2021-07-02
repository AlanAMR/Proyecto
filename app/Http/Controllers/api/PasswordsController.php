<?php

namespace App\Http\Controllers\api;


use Illuminate\Support\Facades\Crypt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

use App\Imports\DataImport;
use Maatwebsite\Excel\Facades\Excel;

use App\PassEmail;
use App\Empleados;

use App\PassSisOp;
use App\Laptops;
use App\Computadoras;
use App\Servidores;

use App\PassAnyDesk;
use App\PassBitlocker;
use App\PassContpaq;

use App\ConexionSMTP;
use App\Carpetas;
use App\CarpetasUsuarios;

use Exception;

class PasswordsController extends Controller
{
    public function encriptar(Request $request){

    }

    public function desencriptar(Request $request){
    	if($request->has('password')){

    		$cadenaDesencriptada = Crypt::decryptString($request->password);
        	return response()->json(['message' => $cadenaDesencriptada]);

    	}else{
    		return response()->json(['error' => 'Error al desencriptar'],500);
    	}
    }


    public function procesar_correos(Request $request){

    	//cargar
    	$validate = $request->validate([
    		'file' => 'required'
    	]);


    	try{

    		$file = $request->file('file');
    		$destinationPath = 'Importar';
      		$file->move($destinationPath,'passwords_correos.'.$file->getClientOriginalExtension());
	    	 
    	} catch(Exception $ex){
    		return response()->json(['error' => 'Error al Cargar el archivo'],500);
    	}
    	
    	//procesar
    	
    	$array = (new DataImport)->toArray('importar/passwords_correos.'.$file->getClientOriginalExtension());

    	DB::beginTransaction();
    	
    	try{
    		$isFirst = true;
    		foreach ($array as $hoja) {
			    foreach ($hoja as $fila) {
			    	if($isFirst){
			    		$isFirst = false;
			    	}else{
                        if($fila[3] != null){
					    	if($fila[4] != null){
					    		//sin empleado
					    		$empleado = null;
                                $servidor = null;
					    		if($fila[0] != ''){
					    			$empleado = Empleados::where('id','=',$fila[0])->first();
					    		}

                                if($fila[1] != ''){
                                    $servidor = ConexionSMTP::where('servidor_id','=',$fila[1])->first();
                                }

					    		$email = new PassEmail();

                                if($servidor != null){
                                    if(isset($servidor->id)){
                                        $email->conexion_id = $servidor->id;
                                    }else{
                                        $email->conexion_id = null;
                                    }
                                }else
                                {
                                    $email->conexion_id = null;
                                }


					    		if($empleado != null){
					    			if(isset($empleado->id)){
						    			$email->empleado_id = $empleado->id;
					    			}else{
                                        $email->empleado_id = null;
					    			}
					    		}else{
                                    $email->empleado_id = null;
					    		}


                                $email->identificador = $fila[2];
						    	$email->email = $fila[3];
						    	$email->password = Crypt::encryptString($fila[4]);
    		
						    	$email->save();

					    	}
					    }
			    	}
			    }
			}

			DB::commit();
	    	 
    	}catch(Exception $ex){
    		DB::rollBack();
    		return response()->json(['error' => 'No se pudo procesar el archivo'],500);
    	}
    	return response()->json(['message' => 'Archivo procesado con exito']);

    }


    public function procesar_usuarios(Request $request){

        //cargar
        $validate = $request->validate([
            'file' => 'required'
        ]);


        try{

            $file = $request->file('file');
            $destinationPath = 'Importar';
            $file->move($destinationPath,'passwords_usuarios.'.$file->getClientOriginalExtension());
             
        } catch(Exception $ex){
            return response()->json(['error' => 'Error al Cargar el archivo'],500);
        }
        
        //procesar
        
        $array = (new DataImport)->toArray('importar/passwords_usuarios.'.$file->getClientOriginalExtension());

        DB::beginTransaction();
        
        try{
            $isFirst = true;
            foreach ($array as $hoja) {
                foreach ($hoja as $fila) {
                    if($isFirst){
                        $isFirst = false;
                    }else{
                        $usuario = new PassSisOp();
                        
                        if($fila[0] != null)
                            $usuario->equipo_id = $fila[0];
                        else
                            $usuario->equipo_id = null;

                        if($fila[1] != null)
                            $usuario->tipo = $fila[1];
                        else
                            $usuario->tipo = 0;


                        if($fila[2] != null)
                            $usuario->identificador = $fila[2];
                        else
                            $usuario->identificador = '';

                        if($fila[3] != null)
                            $usuario->sistema = $fila[3];
                        else
                            $usuario->sistema = '';

                        if($fila[4] != null)
                            $usuario->usuario = $fila[4];
                        else
                            $usuario->usuario = '';

                        if($fila[5] != null)
                            $usuario->password = Crypt::encryptString($fila[5]); 
                        else
                            $usuario->password = '';

                        $usuario->save();

                    }
                }
            }

            DB::commit();
             
        }catch(Exception $ex){
            DB::rollBack();
            return response()->json(['error' => 'No se pudo procesar el archivo'],500);
        }
        return response()->json(['message' => 'Archivo procesado con exito']);

    }

    public function procesar_anydesk(Request $request){

        //cargar
        $validate = $request->validate([
            'file' => 'required'
        ]);


        try{

            $file = $request->file('file');
            $destinationPath = 'Importar';
            $file->move($destinationPath,'passwords_anydesk.'.$file->getClientOriginalExtension());
             
        } catch(Exception $ex){
            return response()->json(['error' => 'Error al Cargar el archivo'],500);
        }
        
        //procesar
        
        $array = (new DataImport)->toArray('importar/passwords_anydesk.'.$file->getClientOriginalExtension());

        DB::beginTransaction();
        
        try{
            $isFirst = true;
            foreach ($array as $hoja) {
                foreach ($hoja as $fila) {
                    if($isFirst){
                        $isFirst = false;
                    }else{
                        $anydesk = new PassAnyDesk();


                        if($fila[0] != null)
                            $anydesk->equipo_id = $fila[0];
                        else
                            $anydesk->equipo_id = null;

                        if($fila[1] != null)
                            $anydesk->tipo = $fila[1];
                        else
                            $anydesk->tipo = 0;


                        if($fila[2] != null)
                            $anydesk->identificador = $fila[2];
                        else
                            $anydesk->identificador = '';

                        if($fila[3] != null)
                            $anydesk->anydesk = $fila[3];
                        else
                            $anydesk->anydesk = '';

                        if($fila[4] != null)
                            $anydesk->password = Crypt::encryptString($fila[4]); 
                        else
                            $anydesk->password = '';

                        $anydesk->save();

                    }
                }
            }

            DB::commit();
             
        }catch(Exception $ex){
            DB::rollBack();
            return response()->json(['error' => 'No se pudo procesar el archivo'],500);
        }
        return response()->json(['message' => 'Archivo procesado con exito']);

    }

    public function procesar_bitlocker(Request $request){

        //cargar
        $validate = $request->validate([
            'file' => 'required'
        ]);


        try{

            $file = $request->file('file');
            $destinationPath = 'Importar';
            $file->move($destinationPath,'claves_bitlocker.'.$file->getClientOriginalExtension());
             
        } catch(Exception $ex){
            return response()->json(['error' => 'Error al Cargar el archivo'],500);
        }
        
        //procesar
        
        $array = (new DataImport)->toArray('importar/claves_bitlocker.'.$file->getClientOriginalExtension());

        DB::beginTransaction();
        
        try{
            $isFirst = true;
            foreach ($array as $hoja) {
                foreach ($hoja as $fila) {
                    if($isFirst){
                        $isFirst = false;
                    }else{
                        $bitlocker = new PassBitlocker();


                        if($fila[0] != null)
                            $bitlocker->equipo_id = $fila[0];
                        else
                            $bitlocker->equipo_id = null;

                        if($fila[1] != null)
                            $bitlocker->tipo = $fila[1];
                        else
                            $bitlocker->tipo = 0;


                        if($fila[2] != null)
                            $bitlocker->identificador = $fila[2];
                        else
                            $bitlocker->identificador = '';

                        if($fila[3] != null)
                            $bitlocker->clave = $fila[3];
                        else
                            $bitlocker->clave = '';

                        if($fila[4] != null)
                            $bitlocker->clave_recuperacion = Crypt::encryptString($fila[4]); 
                        else
                            $bitlocker->clave_recuperacion = '';

                        $bitlocker->save();

                    }
                }
            }

            DB::commit();
             
        }catch(Exception $ex){
            DB::rollBack();
            return response()->json(['error' => 'No se pudo procesar el archivo'],500);
        }
        return response()->json(['message' => 'Archivo procesado con exito']);

    }


    public function procesar_contpaq(Request $request){

        //cargar
        $validate = $request->validate([
            'file' => 'required'
        ]);


        try{

            $file = $request->file('file');
            $destinationPath = 'Importar';
            $file->move($destinationPath,'passwords_contpaq.'.$file->getClientOriginalExtension());
             
        } catch(Exception $ex){
            return response()->json(['error' => 'Error al Cargar el archivo'],500);
        }
        
        //procesar
        
        $array = (new DataImport)->toArray('importar/passwords_contpaq.'.$file->getClientOriginalExtension());

        DB::beginTransaction();
        
        try{
            $isFirst = true;
            foreach ($array as $hoja) {
                foreach ($hoja as $fila) {
                    if($isFirst){
                        $isFirst = false;
                    }else{
                        if($fila[1] != null){
                            if($fila[2] != null){
                                //sin empleado
                                $empleado = null;

                                if($fila[0] != ''){
                                    $empleado = Empleados::where('id','=',$fila[0])->first();
                                }

                                $contpaq = new PassContpaq();


                                if($empleado != null){
                                    if(isset($empleado->id)){

                                        $contpaq->empleado_id = $empleado->id;
                                        $contpaq->identificador = $empleado->nombre;
                                        
                                    }else{
                                        $contpaq->identificador = $fila[1];
                                    }
                                }else{
                                    $contpaq->identificador = $fila[1];
                                }

                                $contpaq->usuario = $fila[2];
                                $contpaq->password = Crypt::encryptString($fila[3]);
            
                                $contpaq->save();

                            }
                        }
                    }
                }
            }

            DB::commit();
             
        }catch(Exception $ex){
            DB::rollBack();
            return response()->json(['error' => 'No se pudo procesar el archivo'],500);
        }
        return response()->json(['message' => 'Archivo procesado con exito']);

    }


    public function procesar_carpetas(Request $request){

        //cargar
        $validate = $request->validate([
            'file' => 'required'
        ]);

        try{

            $file = $request->file('file');
            $destinationPath = 'Importar';
            $file->move($destinationPath,'carpetas.'.$file->getClientOriginalExtension());
             
        } catch(Exception $ex){
            return response()->json(['error' => 'Error al Cargar el archivo'],500);
        }
        
        //procesar
        
        $array = (new DataImport)->toArray('importar/carpetas.'.$file->getClientOriginalExtension());

        DB::beginTransaction();
        
        try{
            $isFirst = true;
            foreach ($array as $hoja) {
                foreach ($hoja as $fila) {
                    if($isFirst){
                        $isFirst = false;
                    }else{
                        $carpeta = new Carpetas();
                        $servidor = null;

                        if($fila[0] != null){
                            $servidor = Servidores::where('id','=',$fila[0])->first();
                            $carpeta->servidor_id = $servidor->id;
                        }else
                        {
                            $carpeta->servidor_id = null;
                        }

                        if($fila[1] != null){
                            $carpeta->identificador = $fila[1];
                        }else
                        {
                            $carpeta->identificador = '';
                        }

                        if($fila[2] != null){
                            $carpeta->ruta = $fila[2];
                        }else
                        {
                            $carpeta->ruta = '';
                        }

                        $carpeta->save();
                    }
                }
            }

            DB::commit();
             
        }catch(Exception $ex){
            DB::rollBack();
            return response()->json(['error' => 'No se pudo procesar el archivo: '.$ex],500);
        }
        return response()->json(['message' => 'Archivo procesado con exito']);

    }

    public function procesar_carpetasusuarios(Request $request){

        //cargar
        $validate = $request->validate([
            'file' => 'required'
        ]);

        try{

            $file = $request->file('file');
            $destinationPath = 'Importar';
            $file->move($destinationPath,'carpetasusuarios.'.$file->getClientOriginalExtension());
             
        } catch(Exception $ex){
            return response()->json(['error' => 'Error al Cargar el archivo'],500);
        }
        
        //procesar
        
        $array = (new DataImport)->toArray('importar/carpetasusuarios.'.$file->getClientOriginalExtension());

        DB::beginTransaction();
        
        try{
            $isFirst = true;
            foreach ($array as $hoja) {
                foreach ($hoja as $fila) {
                    if($isFirst){
                        $isFirst = false;
                    }else{
                        
                        $usuario = new CarpetasUsuarios();

                        if($fila[0] != null){
                            $usuario->carpeta_id = $fila[0];
                            $usuario->usuarioras_id = $fila[1];
                            $usuario->empleado_id = $fila[2];
                            $usuario->permisos = $fila[3];

                            $usuario->save();
                        }
                    }
                }
            }

            DB::commit();
             
        }catch(Exception $ex){
            DB::rollBack();
            return response()->json(['error' => 'No se pudo procesar el archivo: '.$ex],500);
        }
        return response()->json(['message' => 'Archivo procesado con exito']);

    }
}
