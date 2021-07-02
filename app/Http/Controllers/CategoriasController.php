<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categorias;
use App\Subcategorias;

class CategoriasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function inicio(){
    	
    	$titulo = "Todas las categorias";
    	$categorias = Categorias::all()->where('status','!=','0');
    	

    	return view('almacen.categorias.index')
    		->with('categorias',$categorias)
    		->with('titulo',$titulo)
    	;
    }

    public function nuevo(){

        return view('almacen.categorias.nuevo')
            ->with('titulo','Añadir nueva categoria');

    }


    public function crear(Request $request){
        
        $validate = $request->validate([
            'nombre' => 'required'
        ]);

        $categoria = new Categorias();

        $categoria->valor = $request->nombre;

        $categoria->save();

        return redirect('almacen-general/categorias')->with('success','Categorias '.$categoria->valor.' añadida con exito.');

    }

    public function modificar($id){

        $categoria = Categorias::findOrFail($id);

        return view('almacen.categorias.modificar')
            ->with('categoria',$categoria)
            ->with('titulo','Modificar la categoria '.$categoria->valor);

    }

    public function actualizar(Request $request){

        $validate = $request->validate([
            'id' => 'required',
            'nombre' => 'required'
        ]);

        $categoria = Categorias::findOrFail($request->id);

        $categoria->valor = $request->nombre;

        $categoria->update();

        return redirect()->back()->with('success','Categoria actualizada con exito.');
    }

    public function eliminar(Request $request){

        $validate = $request->validate([
            'id' => 'required'
        ]);

        $categoria = Categorias::findOrFail($request->id);

        if(Subcategorias::where('categoria_id','=',$categoria->id)->count() > 0){
            return redirect()->back()->with('error','No es posible eliminar la categoria, aun tiene subcategorias dependientes.');
        }
        else{
            $categoria->delete();
        }
        return redirect('almacen-general/categorias')->with('success','Se elimino la categoria con exito.');

        
    }

  
}
