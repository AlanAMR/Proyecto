<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Articulos;
use App\Categorias;
use App\Subcategorias;

use App\Imports\DataImport;

use Maatwebsite\Excel\Facades\Excel;

class ArticulosController extends Controller
{
    //
    public function getsubcategorias($categoria){
    	try{

	    	$subcategorias = Subcategorias::where('categoria_id','=',$categoria)->get(); 
    	} catch(Exception $ex){
    		return response()->json(['error' => 'Error al obtener las subcategorias'],500);
    	}
    	return response()->json(['subcategorias' => $subcategorias]);
    }

    public function cargar_csv(Request $request){
    	
    	$validate = $request->validate([
    		'file' => 'required'
    	]);

    	try{

    		$file = $request->file('file');
    		$destinationPath = 'Importar';
      		$file->move($destinationPath,'articulos.'.$file->getClientOriginalExtension());
	    	 
    	} catch(Exception $ex){
    		return response()->json(['error' => 'Error al Cargar el archivo'],500);
    	}
    	return response()->json(['message' => 'Archivo cargado con exito']);
    }

    public function procesar_csv(){

    	$array = (new DataImport)->toArray('importar/articulos.xlsx');

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
					    			$articulo = new Articulos();

					    			$categoria = Categorias::where('valor','=',$fila[1])->first();

					    			if($categoria == null){

					    				$categoria = new Categorias();

					    				$categoria->valor = $fila[1];

					    				$categoria->save();

					    			}

					    			$subcategoria = Subcategorias::where('valor','=',$fila[2])->first();

					    			if($subcategoria == null){
					    				$subcategoria = new Subcategorias();

					    				$subcategoria->valor = $fila[2];
					    				$subcategoria->categoria_id = $categoria->id;
					    				$subcategoria->save();
					    			}

					    			$articulo->nombre = $fila[0];
					    			$articulo->categoria_id = $categoria->id;
					    			$articulo->subcategoria_id = $subcategoria->id;
					    			$articulo->imagen = '';
					    			$articulo->save();
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
