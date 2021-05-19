<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulos;
use App\Almacenes;
use App\Categorias;
use App\Subcategorias;

use App\Exports\ArchivoPrimarioExport;
use Maatwebsite\Excel\Facades\Excel;


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

    public function cargar_csv(){

    	return view('almacen.articulos.cargar_csv')
    		->with('titulo','Carga de Multiples Articulos via CSV')
    	;
    }

    public function exportar_plantilla(){

	    	$export = new ArchivoPrimarioExport;

	    	return Excel::download($export, 'test.xlsx');

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


    public function crear(Request $request){

        $validate = $request->validate([
            'nombre' => 'required',
            'categoria' => 'required',
            'subcategoria' => 'required'
        ]);


        $articulo = new Articulos();

        $articulo->nombre = $request->nombre;
        $articulo->categoria_id = $request->categoria;
        $articulo->subcategoria_id = $request->subcategoria;
        $articulo->imagen = '';

        $articulo->save();

        if($request->has('imagen-principal')){
            $file = $request->file('imagen-principal');
            $destinationPath = 'articulos/'.$articulo->id;
            $file->move($destinationPath,'imagen-principal.'.$file->getClientOriginalExtension());
            $articulo->imagen = 'imagen-principal.'.$file->getClientOriginalExtension();
        }

        if($request->has('imagen-secundaria')){    
            $i = 0;
            foreach ($request->file('imagen-secundaria') as $file) {
                $name = 'imagen-'.$i.'.'.$file->extension();
                $file->move(public_path().'/files/', $name);  
                $i++;   
            }
        }

        $articulo->update();
    }

}
