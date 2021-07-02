<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categorias;
use App\Subcategorias;
use App\Articulos;

class SubcategoriasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function inicio(){
    	
    	$titulo = "Todas las subcategorias";
    	$subcategorias = Subcategorias::
            select('subcategorias.*','categorias.valor as categoria')
            ->join('categorias','categorias.id','=','subcategorias.categoria_id')
            ->get();

    	

    	return view('almacen.subcategorias.index')
    		->with('subcategorias',$subcategorias)
    		->with('titulo',$titulo)
    	;
    }

    public function nuevo(){
        
        $categorias = Categorias::all();

        return view('almacen.subcategorias.nuevo')
            ->with('titulo','Añadir nueva subcategoria')
            ->with('categorias',$categorias)
            ;

    }


    public function crear(Request $request){
        
        $validate = $request->validate([
            'nombre' => 'required',
            'categoria' => 'required'
        ]);

        $subcategoria = new Subcategorias();

        $subcategoria->valor = $request->nombre;
        $subcategoria->categoria_id = $request->categoria;

        $subcategoria->save();

        return redirect('almacen-general/subcategorias')->with('success','Subcategoria '.$subcategoria->valor.' añadida con exito.');

    }

    public function modificar($id){

        $subcategoria = Subcategorias::findOrFail($id);

        $categoria = Categorias::findOrFail($subcategoria->categoria_id);

        $categorias = Categorias::all();

        return view('almacen.subcategorias.modificar')
            ->with('subcategoria',$subcategoria)
            ->with('categoria',$categoria)
            ->with('categorias',$categorias)
            ->with('titulo','Modificar la subcategoria '.$subcategoria->valor);

    }

    public function actualizar(Request $request){

        $validate = $request->validate([
            'id' => 'required',
            'nombre' => 'required',
            'categoria' => 'required'
        ]);

        $subcategoria = Subcategorias::findOrFail($request->id);

        $subcategoria->valor = $request->nombre;

        $subcategoria->categoria_id = $request->categoria;

        $subcategoria->update();

        return redirect()->back()->with('success','Subcategoria actualizada con exito.');
    }

    public function eliminar(Request $request){

        $validate = $request->validate([
            'id' => 'required'
        ]);

        $subcategoria = Subcategorias::findOrFail($request->id);

        if(Articulos::where('subcategoria_id','=',$subcategoria->id)->count() > 0){
            return redirect()->back()->with('error','No es posible eliminar la categoria, aun tiene articulos dependientes.');
        }
        else{
            $categoria->delete();
        }
        return redirect('almacen-general/categorias')->with('success','Se elimino la categoria con exito.');

        
    }

  
}
