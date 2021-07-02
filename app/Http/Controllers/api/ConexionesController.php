<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

use App\Imports\DataImport;
use Maatwebsite\Excel\Facades\Excel;

use App\Empleados;

use App\PassSisOp;
use App\Laptops;
use App\Computadoras;
use App\Servidores;
use App\ConexionSMTP;
use App\ConexionDBMS;
use App\ConexionVPN;
use App\ConexionSMB;
use App\ConexionRAS;
use App\ConexionFTP;

use Exception;

class ConexionesController extends Controller
{

    public function procesar_smtp(Request $request){

        //cargar
        $validate = $request->validate([
            'file' => 'required'
        ]);


        try{

            $file = $request->file('file');
            $destinationPath = 'Importar';
            $file->move($destinationPath,'conexiones_smtp.'.$file->getClientOriginalExtension());
             
        } catch(Exception $ex){
            return response()->json(['error' => 'Error al Cargar el archivo'],500);
        }
        
        //procesar
        
        $array = (new DataImport)->toArray('importar/conexiones_smtp.'.$file->getClientOriginalExtension());

        DB::beginTransaction();
        
        try{
            $isFirst = true;
            foreach ($array as $hoja) {
                foreach ($hoja as $fila) {
                    if($isFirst){
                        $isFirst = false;
                    }else{
                        $smtp = new ConexionSMTP();


                        if($fila[0] != null)
                            $smtp->servidor_id = $fila[0];
                        else
                            $smtp->servidor_id = null;


                        if($fila[1] != null)
                            $smtp->identificador = $fila[1];
                        else
                            $smtp->identificador = '';

                        if($fila[2] != null)
                            $smtp->dominio = $fila[2];
                        else
                            $smtp->dominio = '';

                        if($fila[3] != null)
                            $smtp->protocolo_acceso = $fila[3]; 
                        else
                            $smtp->protocolo_acceso = '';

                        if($fila[4] != null)
                            $smtp->servidor_entrante = $fila[4]; 
                        else
                            $smtp->servidor_entrante = '';

                        if($fila[5] != null)
                            $smtp->puerto_entrada = $fila[5]; 
                        else
                            $smtp->puerto_entrada = '';

                        if($fila[6] != null)
                            $smtp->cifrado_entrante = $fila[6]; 
                        else
                            $smtp->cifrado_entrante = '';

                        if($fila[7] != null)
                            $smtp->servidor_saliente = $fila[7]; 
                        else
                            $smtp->servidor_saliente = '';

                        if($fila[8] != null)
                            $smtp->puerto_salida = $fila[8]; 
                        else
                            $smtp->puerto_salida = '';

                        if($fila[9] != null)
                            $smtp->cifrado_saliente = $fila[9]; 
                        else
                            $smtp->cifrado_saliente = '';

                        $smtp->save();

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

    public function procesar_dbms(Request $request){

        //cargar
        $validate = $request->validate([
            'file' => 'required'
        ]);


        try{

            $file = $request->file('file');
            $destinationPath = 'Importar';
            $file->move($destinationPath,'conexiones_dbsms.'.$file->getClientOriginalExtension());
             
        } catch(Exception $ex){
            return response()->json(['error' => 'Error al Cargar el archivo'],500);
        }
        
        //procesar
        
        $array = (new DataImport)->toArray('importar/conexiones_dbsms.'.$file->getClientOriginalExtension());

        DB::beginTransaction();
        
        try{
            $isFirst = true;
            foreach ($array as $hoja) {
                foreach ($hoja as $fila) {
                    if($isFirst){
                        $isFirst = false;
                    }else{
                        $dbms = new ConexionDBMS();


                        if($fila[0] != null)
                            $dbms->servidor_id = $fila[0];
                        else
                            $dbms->servidor_id = null;


                        if($fila[1] != null)
                            $dbms->identificador = $fila[1];
                        else
                            $dbms->identificador = '';

                        if($fila[2] != null)
                            $dbms->gestor_dbms = $fila[2];
                        else
                            $dbms->gestor_dbms = '';

                        if($fila[3] != null)
                            $dbms->servidor = $fila[3];
                        else
                            $dbms->servidor = '';

                        if($fila[4] != null)
                            $dbms->puerto = $fila[4]; 
                        else
                            $dbms->puerto = '';

                        if($fila[5] != null)
                            $dbms->dataset = $fila[5]; 
                        else
                            $dbms->dataset = '';

                        $dbms->save();

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
            $file->move($destinationPath,'conexiones_vpn.'.$file->getClientOriginalExtension());
             
        } catch(Exception $ex){
            return response()->json(['error' => 'Error al Cargar el archivo'],500);
        }
        
        //procesar
        
        $array = (new DataImport)->toArray('importar/conexiones_vpn.'.$file->getClientOriginalExtension());

        DB::beginTransaction();
        
        try{
            $isFirst = true;
            foreach ($array as $hoja) {
                foreach ($hoja as $fila) {
                    if($isFirst){
                        $isFirst = false;
                    }else{
                        $vpn = new ConexionVPN();


                        if($fila[0] != null)
                            $vpn->servidor_id = $fila[0];
                        else
                            $vpn->servidor_id = null;


                        if($fila[1] != null)
                            $vpn->identificador = $fila[1];
                        else
                            $vpn->identificador = '';

                        if($fila[2] != null)
                            $vpn->servidor = $fila[2];
                        else
                            $vpn->servidor = '';
                        
                        if($fila[3] != null)
                            $vpn->puerto = $fila[3];
                        else
                            $vpn->puerto = '';

                        if($fila[4] != null)
                            $vpn->cifrado = $fila[4];
                        else
                            $vpn->cifrado = '';

                        $vpn->save();

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

    public function procesar_smb(Request $request){

        //cargar
        $validate = $request->validate([
            'file' => 'required'
        ]);


        try{

            $file = $request->file('file');
            $destinationPath = 'Importar';
            $file->move($destinationPath,'conexiones_smb.'.$file->getClientOriginalExtension());
             
        } catch(Exception $ex){
            return response()->json(['error' => 'Error al Cargar el archivo'],500);
        }
        
        //procesar
        
        $array = (new DataImport)->toArray('importar/conexiones_smb.'.$file->getClientOriginalExtension());

        DB::beginTransaction();
        
        try{
            $isFirst = true;
            foreach ($array as $hoja) {
                foreach ($hoja as $fila) {
                    if($isFirst){
                        $isFirst = false;
                    }else{
                        $smb = new ConexionSMB();


                        if($fila[0] != null)
                            $smb->servidor_id = $fila[0];
                        else
                            $smb->servidor_id = null;


                        if($fila[1] != null)
                            $smb->identificador = $fila[1];
                        else
                            $smb->identificador = '';

                        if($fila[2] != null)
                            $smb->servidor = $fila[2];
                        else
                            $smb->servidor = '';
                        
                        if($fila[3] != null)
                            $smb->puerto = $fila[3];
                        else
                            $smb->puerto = '';

                        $smb->save();

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
            $file->move($destinationPath,'conexiones_ras.'.$file->getClientOriginalExtension());
             
        } catch(Exception $ex){
            return response()->json(['error' => 'Error al Cargar el archivo'],500);
        }
        
        //procesar
        
        $array = (new DataImport)->toArray('importar/conexiones_ras.'.$file->getClientOriginalExtension());

        DB::beginTransaction();
        
        try{
            $isFirst = true;
            foreach ($array as $hoja) {
                foreach ($hoja as $fila) {
                    if($isFirst){
                        $isFirst = false;
                    }else{
                        $ras = new ConexionRAS();


                        if($fila[0] != null)
                            $ras->servidor_id = $fila[0];
                        else
                            $ras->servidor_id = null;


                        if($fila[1] != null)
                            $ras->identificador = $fila[1];
                        else
                            $ras->identificador = '';

                        if($fila[2] != null)
                            $ras->tipo = $fila[2];
                        else
                            $ras->tipo = '';

                        if($fila[3] != null)
                            $ras->servidor = $fila[3];
                        else
                            $ras->servidor = '';
                        
                        if($fila[4] != null)
                            $ras->puerto = $fila[4];
                        else
                            $ras->puerto = '';

                        $ras->save();

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
            $file->move($destinationPath,'conexiones_ftp.'.$file->getClientOriginalExtension());
             
        } catch(Exception $ex){
            return response()->json(['error' => 'Error al Cargar el archivo'],500);
        }
        
        //procesar
        
        $array = (new DataImport)->toArray('importar/conexiones_ftp.'.$file->getClientOriginalExtension());

        DB::beginTransaction();
        
        try{
            $isFirst = true;
            foreach ($array as $hoja) {
                foreach ($hoja as $fila) {
                    if($isFirst){
                        $isFirst = false;
                    }else{
                        $ftp = new ConexionFTP();


                        if($fila[0] != null)
                            $ftp->servidor_id = $fila[0];
                        else
                            $ftp->servidor_id = null;


                        if($fila[1] != null)
                            $ftp->identificador = $fila[1];
                        else
                            $ftp->identificador = '';

                        if($fila[2] != null)
                            $ftp->servidor = $fila[2];
                        else
                            $ftp->servidor = '';
                        
                        if($fila[3] != null)
                            $ftp->puerto = $fila[3];
                        else
                            $ftp->puerto = '';

                        $ftp->save();

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
