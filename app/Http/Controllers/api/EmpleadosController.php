<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

use App\Imports\DataImport;
use Maatwebsite\Excel\Facades\Excel;

use App\EmpleadoBaja;
use App\Empresas;
use Exception;

class EmpleadosController extends Controller
{

    public function procesar_bajas(Request $request){
        //cargar
        $validate = $request->validate([
            'file' => 'required'
        ]);

        try{

            $file = $request->file('file');
            $destinationPath = 'Importar';
            $file->move($destinationPath,'bajas.'.$file->getClientOriginalExtension());
             
        } catch(Exception $ex){
            return response()->json(['error' => 'Error al Cargar el archivo'],500);
        }
        
        $array = (new DataImport)->toArray('importar/bajas.'.$file->getClientOriginalExtension());

        DB::beginTransaction();
        $i = 1;
        
        try{
            $isFirst = true;
            foreach ($array as $hoja) {
                foreach ($hoja as $fila) {
                    if($isFirst){
                        $isFirst = false;
                    }else{

                        $baja = new EmpleadoBaja();

                        if($fila[0] != null)
                            $baja->fecha_solicitud = $fila[0];
                        else
                            $baja->fecha_solicitud = null;

                        if($fila[1] != null)
                            $baja->lote_imss = $fila[1];
                        else
                            $baja->lote_imss = null;

                        if($fila[2] != null)
                            $baja->periodo = $fila[2];
                        else
                            $baja->periodo = null;

                        if($fila[3] != null)
                            $baja->parametro = $fila[3];
                        else
                            $baja->parametro = null;

                        if($fila[4] != null)
                            $baja->clave_empleado  = str_replace('#', '', $fila[4]);
                        else
                            $baja->clave_empleado = null;

                        if($fila[5] != null)
                            $baja->sparh = $fila[5];
                        else
                            $baja->sparh = null;

                        if($fila[6] != null)
                            $baja->paterno = $fila[6];
                        else
                            $baja->paterno = null;

                        if($fila[7] != null)
                            $baja->materno = $fila[7];
                        else
                            $baja->materno = null;

                        if($fila[8] != null)
                            $baja->nombre = $fila[8];
                        else
                            $baja->nombre = null;

                        if($fila[9] != null)
                            $baja->fecha_baja = $fila[9];
                        else
                            $baja->fecha_baja = null;

                        if($fila[10] != null)
                            $baja->nss = $fila[10];
                        else
                            $baja->nss = null;

                        if($fila[11] != null)
                            $baja->motivo_baja = $fila[11];
                        else
                            $baja->motivo_baja = null;

                        if($fila[12] != null)
                            $baja->registro_patronal = $fila[12];
                        else
                            $baja->registro_patronal = null;

                        if($fila[13] != null){
                            if($fila[13] == 'I'){
                                $baja->clase = 1;
                            }
                            if($fila[13] == 'II'){
                                $baja->clase = 2;
                            }
                        }
                        else
                            $baja->clase = null;

                        if($fila[14] != null){
                            $empresa = Empresas::where('nombre','=',$fila[14])->first();
                            
                            // Si existe la empresa añade la relcacion
                            if(isset($empresa->id)){
                                $baja->empresa_id = $empresa->id;
                            }else{
                            // Si no existe añade la empresa y luego la relacion.
                                $empresa = new Empresas();
                                $empresa->nombre = $fila[14];
                                $empresa->save();

                                $baja->empresa_id = $empresa->id;
                            }
                        }else{
                            $baja->empresa_id = null;
                        }

                        if($fila[15] != null)
                            $baja->observaciones = $fila[15];
                        else
                            $baja->observaciones = null;

                        $baja->save();
                        $i++;
                    }
                }
            }

            DB::commit();
             
        }catch(Exception $ex){
            DB::rollBack();
            return response()->json(['error' => 'No se pudo procesar el archivo: '.$i.'  ex:'.$ex],500);
        }
        return response()->json(['message' => 'Archivo procesado con exito']);

    }

}
