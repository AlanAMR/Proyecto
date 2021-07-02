<?php

namespace App\Http\Controllers\api;


use Illuminate\Support\Facades\Crypt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

use App\Imports\DataImport;
use Maatwebsite\Excel\Facades\Excel;

use App\UsuarioDBMS;
use App\UsuarioRAS;
use App\UsuarioVPN;
use App\UsuarioFTP;

use Exception;

class UsuariosController extends Controller
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

    public function procesar_dbms(Request $request){

        //cargar
        $validate = $request->validate([
            'file' => 'required'
        ]);


        try{

            $file = $request->file('file');
            $destinationPath = 'Importar';
            $file->move($destinationPath,'usuarios_dbms.'.$file->getClientOriginalExtension());
             
        } catch(Exception $ex){
            return response()->json(['error' => 'Error al Cargar el archivo'],500);
        }
        
        //procesar
        
        $array = (new DataImport)->toArray('importar/usuarios_dbms.'.$file->getClientOriginalExtension());
        DB::beginTransaction();
        
        try{
            $isFirst = true;
            foreach ($array as $hoja) {
                foreach ($hoja as $fila) {
                    if($isFirst){
                        $isFirst = false;
                    }else{

                        $usuario = new UsuarioDBMS();
                        
                        if($fila[0] != null)
                            $usuario->dbms_id = $fila[0];
                        else
                            $usuario->dbms_id = null;

                        if($fila[1] != null)
                            $usuario->identificador = $fila[1];
                        else
                            $usuario->identificador = '';

                        if($fila[2] != null)
                            $usuario->usuario = $fila[2];
                        else
                            $usuario->usuario = '';

                        if($fila[3] != null)
                            $usuario->password = Crypt::encryptString($fila[3]); 
                        else
                            $usuario->password = '';

                        $usuario->save();

                    }
                }
            }

            DB::commit();
             
        }catch(Exception $ex){
            DB::rollBack();
            return response()->json(['error' => 'No se pudo procesar el archivo'.$ex],500);
        }
        return response()->json(['message' => 'Archivo procesado con exito']);

    }

    public function procesar_ras(Request $request){

        //cargar
        $validate = $request->validate([
            'file' => 'required'
        ]);


        try{

            $file = $request->file('file');
            $destinationPath = 'Importar';
            $file->move($destinationPath,'usuarios_ras.'.$file->getClientOriginalExtension());
             
        } catch(Exception $ex){
            return response()->json(['error' => 'Error al Cargar el archivo'],500);
        }
        
        //procesar
        
        $array = (new DataImport)->toArray('importar/usuarios_ras.'.$file->getClientOriginalExtension());
        DB::beginTransaction();
        
        try{
            $isFirst = true;
            foreach ($array as $hoja) {
                foreach ($hoja as $fila) {
                    if($isFirst){
                        $isFirst = false;
                    }else{

                        $usuario = new UsuarioRAS();
                        
                        if($fila[0] != null)
                            $usuario->conexion_id = $fila[0];
                        else
                            $usuario->conexion_id = null;

                        if($fila[1] != null)
                            $usuario->identificador = $fila[1];
                        else
                            $usuario->identificador = '';

                        if($fila[2] != null)
                            $usuario->usuario = $fila[2];
                        else
                            $usuario->usuario = '';

                        if($fila[3] != null)
                            $usuario->password = Crypt::encryptString($fila[3]); 
                        else
                            $usuario->password = '';

                        $usuario->save();

                    }
                }
            }

            DB::commit();
             
        }catch(Exception $ex){
            DB::rollBack();
            return response()->json(['error' => 'No se pudo procesar el archivo'.$ex],500);
        }
        return response()->json(['message' => 'Archivo procesado con exito']);

    }

    public function procesar_vpn(Request $request){

        //cargar
        $validate = $request->validate([
            'file' => 'required'
        ]);


        try{

            $file = $request->file('file');
            $destinationPath = 'Importar';
            $file->move($destinationPath,'usuarios_vpn.'.$file->getClientOriginalExtension());
             
        } catch(Exception $ex){
            return response()->json(['error' => 'Error al Cargar el archivo'],500);
        }
        
        //procesar
        
        $array = (new DataImport)->toArray('importar/usuarios_vpn.'.$file->getClientOriginalExtension());
        DB::beginTransaction();
        
        try{
            $isFirst = true;
            foreach ($array as $hoja) {
                foreach ($hoja as $fila) {
                    if($isFirst){
                        $isFirst = false;
                    }else{

                        $usuario = new UsuarioVPN();
                        
                        if($fila[0] != null)
                            $usuario->conexion_id = $fila[0];
                        else
                            $usuario->conexion_id = null;

                        if($fila[1] != null)
                            $usuario->identificador = $fila[1];
                        else
                            $usuario->identificador = '';

                        if($fila[2] != null)
                            $usuario->usuario = $fila[2];
                        else
                            $usuario->usuario = '';

                        if($fila[3] != null)
                            $usuario->password = Crypt::encryptString($fila[3]); 
                        else
                            $usuario->password = '';

                        $usuario->save();

                    }
                }
            }

            DB::commit();
             
        }catch(Exception $ex){
            DB::rollBack();
            return response()->json(['error' => 'No se pudo procesar el archivo'.$ex],500);
        }
        return response()->json(['message' => 'Archivo procesado con exito']);

    }

    public function procesar_ftp(Request $request){

        //cargar
        $validate = $request->validate([
            'file' => 'required'
        ]);


        try{

            $file = $request->file('file');
            $destinationPath = 'Importar';
            $file->move($destinationPath,'usuarios_ftp.'.$file->getClientOriginalExtension());
             
        } catch(Exception $ex){
            return response()->json(['error' => 'Error al Cargar el archivo'],500);
        }
        
        //procesar
        
        $array = (new DataImport)->toArray('importar/usuarios_ftp.'.$file->getClientOriginalExtension());
        DB::beginTransaction();
        
        try{
            $isFirst = true;
            foreach ($array as $hoja) {
                foreach ($hoja as $fila) {
                    if($isFirst){
                        $isFirst = false;
                    }else{

                        $usuario = new UsuarioFTP();
                        
                        if($fila[0] != null)
                            $usuario->conexion_id = $fila[0];
                        else
                            $usuario->conexion_id = null;

                        if($fila[1] != null)
                            $usuario->identificador = $fila[1];
                        else
                            $usuario->identificador = '';

                        if($fila[2] != null)
                            $usuario->usuario = $fila[2];
                        else
                            $usuario->usuario = '';

                        if($fila[3] != null)
                            $usuario->password = Crypt::encryptString($fila[3]); 
                        else
                            $usuario->password = '';

                        $usuario->save();

                    }
                }
            }

            DB::commit();
             
        }catch(Exception $ex){
            DB::rollBack();
            return response()->json(['error' => 'No se pudo procesar el archivo'.$ex],500);
        }
        return response()->json(['message' => 'Archivo procesado con exito']);

    }

}
