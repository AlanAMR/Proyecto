<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Imports\DataImport;
use Maatwebsite\Excel\Facades\Excel;

use App\Chips;


class ChipsController extends Controller
{
    public function cargar_csv(Request $request){
    	
    	$validate = $request->validate([
    		'file' => 'required'
    	]);

    	try{

    		$file = $request->file('file');
    		$destinationPath = 'Importar';
      		$file->move($destinationPath,'chips.'.$file->getClientOriginalExtension());
	    	 
    	} catch(Exception $ex){
    		return response()->json(['error' => 'Error al Cargar el archivo'],500);
    	}
    	return response()->json(['message' => 'Archivo cargado con exito']);
    }


    public function procesar_csv(){

    	$array = (new DataImport)->toArray('importar/chips.xlsx');

    	try{

    		$isFirst = true;

    		foreach ($array as $hoja) {
			    foreach ($hoja as $fila) {
			    	if($isFirst){
			    		$isFirst = false;
			    	}else{
				    	if($fila[0] != null){
					    	if($fila[1] != null){
					    		if($fila[2] != null){
					    			if($fila[3] != null){

					    				$chip = Chips::firstOrNew(array('sim' => $fila[1]));
					    				
					    				$chip->numero = $fila[0];
					    				$chip->sim = $fila[1];
					    				$chip->operador = $fila[2];
					    				$chip->plan = $fila[3];

					    				$chip->save();
					    			}
					    		}
					    	}
					    }
			    	}
			    }
			}
	    	 
    	}catch(Exception $ex){
    		return response()->json(['error' => 'No se pudo procesar el archivo'],500);
    	}
    	return response()->json(['message' => 'Archivo procesado con exito']);
    }
}
