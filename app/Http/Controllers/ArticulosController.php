<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulos;
use App\Almacenes;
use App\Categorias;
use App\Subcategorias;


class ArticulosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function inicio(){
    	
    	$articulos = Articulos::
            select('articulos.*','categorias.valor as categoria','subcategorias.valor as subcategoria')
            ->join('subcategorias','subcategorias.id','=','articulos.subcategoria_id')
            ->join('categorias','categorias.id','=','articulos.categoria_id')
            ->where('articulos.status','!=','0')
            ->get();
    	
    	return view('almacen.articulos.index')
    		->with('articulos',$articulos)
    		->with('titulo','Gestion de Articulos')
    	;
    }

    public function eliminar(Request $request){
        $validate = $request->validate([
            'id' => 'required'
        ]);

        $articulo = Articulos::findOrFail($request->id);
        $articulo->status = 0;
        $articulo->update();

        return redirect()->back()->with('success','Articulo: '.$articulo->nombre.' Eliminado con exito!');

    }

    public function nuevo(){

        $categorias = Categorias::all();
        $subcategorias = Subcategorias::all();

        return view('almacen.articulos.nuevo')
            ->with('subcategorias',$subcategorias)
            ->with('categorias',$categorias)
            ->with('titulo','Nuevo Articulo')
        ;

    }

}
