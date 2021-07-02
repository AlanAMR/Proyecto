<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

use App\Imports\DataImport;
use Maatwebsite\Excel\Facades\Excel;

use App\Servidores;
use App\Laptops;
use App\Celulares;
 
use Exception;

class ServidoresController extends Controller
{

    public function procesar_servidores(Request $request){

        //cargar
        $validate = $request->validate([
            'file' => 'required'
        ]);


        try{

            $file = $request->file('file');
            $destinationPath = 'Importar';
            $file->move($destinationPath,'servidores.'.$file->getClientOriginalExtension());
             
        } catch(Exception $ex){
            return response()->json(['error' => 'Error al Cargar el archivo'],500);
        }
        
        //procesar
        
        $array = (new DataImport)->toArray('importar/servidores.'.$file->getClientOriginalExtension());

        DB::beginTransaction();
        
        try{
            $isFirst = true;
            foreach ($array as $hoja) {
                foreach ($hoja as $fila) {
                    if($isFirst){
                        $isFirst = false;
                    }else{
                        $servidor = new Servidores();


                        if($fila[0] != null)
                            $servidor->identificador = $fila[0];
                        else
                            $servidor->identificador = 'Sin identificador';


                        if($fila[1] != null)
                            $servidor->num_serie = $fila[1];
                        else
                            $servidor->num_serie = '';

                        if($fila[2] != null)
                            $servidor->tipo = $fila[2];
                        else
                            $servidor->tipo = 0;

                        if($fila[3] != null)
                            $servidor->propietario = $fila[3]; 
                        else
                            $servidor->propietario = 0;

                        if($fila[4] != null)
                            $servidor->marca = $fila[4]; 
                        else
                            $servidor->marca = '';

                        if($fila[5] != null)
                            $servidor->modelo = $fila[5]; 
                        else
                            $servidor->modelo = '';

                        if($fila[6] != null)
                            $servidor->almacenamiento = $fila[6]; 
                        else
                            $servidor->almacenamiento = '';

                        if($fila[7] != null)
                            $servidor->ram = $fila[7]; 
                        else
                            $servidor->ram = '';

                        if($fila[8] != null)
                            $servidor->procesador = $fila[8]; 
                        else
                            $servidor->procesador = '';

                        if($fila[9] != null)
                            $servidor->sistema_operativo = $fila[9]; 
                        else
                            $servidor->sistema_operativo = '';

                        if($fila[10] != null)
                            $servidor->antivirus = $fila[10]; 
                        else
                            $servidor->antivirus = '';


                        $servidor->save();
                    }
                }
            }

            DB::commit();
             
        }catch(Exception $ex){
            DB::rollBack();
            return response()->json(['error' => 'No se pudo procesar el archivo: '],500);
        }
        return response()->json(['message' => 'Archivo procesado con exito']);

    }

    public function procesar_laptops(Request $request){

        //cargar
        $validate = $request->validate([
            'file' => 'required'
        ]);


        try{

            $file = $request->file('file');
            $destinationPath = 'Importar';
            $file->move($destinationPath,'laptops.'.$file->getClientOriginalExtension());
             
        } catch(Exception $ex){
            return response()->json(['error' => 'Error al Cargar el archivo'],500);
        }
        
        //procesar
        
        $array = (new DataImport)->toArray('importar/laptops.'.$file->getClientOriginalExtension());

        DB::beginTransaction();
        
        try{
            $isFirst = true;
            foreach ($array as $hoja) {
                foreach ($hoja as $fila) {
                    if($isFirst){
                        $isFirst = false;
                    }else{
                        if($fila[0] != null){
                            if($fila[0] != ''){
                                $laptop = new Laptops();

                                $laptop->num_serie = $fila[0];
                                $laptop->marca = ucfirst(strtolower($fila[1]));
                                $laptop->modelo = $fila[2];
                                $laptop->procesador = ucfirst(strtolower($fila[3]));
                                $laptop->sistema_operativo = ucfirst(strtolower($fila[4]));
                                $laptop->antivirus = ucfirst(strtolower($fila[5]));
                                $laptop->color = ucfirst(strtolower($fila[6]));
                                $laptop->status = $fila[7];

                                $laptop->save();


                            }
                        }
                    }
                }
            }

            DB::commit();
             
        }catch(Exception $ex){
            DB::rollBack();
            return response()->json(['error' => 'No se pudo procesar el archivo: '],500);
        }
        return response()->json(['message' => 'Archivo procesado con exito']);

    }

    public function procesar_celulares(Request $request){

        //cargar
        $validate = $request->validate([
            'file' => 'required'
        ]);


        try{

            $file = $request->file('file');
            $destinationPath = 'Importar';
            $file->move($destinationPath,'celulares.'.$file->getClientOriginalExtension());
             
        } catch(Exception $ex){
            return response()->json(['error' => 'Error al Cargar el archivo'],500);
        }
        
        //procesar
        
        $array = (new DataImport)->toArray('importar/celulares.'.$file->getClientOriginalExtension());

        DB::beginTransaction();
        
        try{
            $isFirst = true;
            foreach ($array as $hoja) {
                foreach ($hoja as $fila) {
                    if($isFirst){
                        $isFirst = false;
                    }else{
                        if($fila[0] != null){
                            if($fila[0] != ''){

                                if(Celulares::where('num_serie','=',$fila[0])->count() == 0){

                                    $celular = new Celulares();

                                    $celular->num_serie = $fila[0];
                                    $celular->imei = $fila[1];
                                    $celular->marca = ucfirst(strtolower($fila[2]));
                                    $celular->modelo = ucfirst(strtolower($fila[3]));
                                    $celular->color = $fila[4];
                                    $celular->companiamovil = $fila[5];
                                    $celular->status = $fila[6];
                                    
                                    $celular->save();
                                }
                            }
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
