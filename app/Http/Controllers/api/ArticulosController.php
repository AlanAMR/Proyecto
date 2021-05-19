<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Articulos;
use App\Categorias;
use App\Subcategorias;

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
}
