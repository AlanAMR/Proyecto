<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\Helper;

use App\Articulos;
use App\ArticulosImagenes;
use App\Almacenes;
use App\Categorias;
use App\Subcategorias;
use App\Roles;

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

        $cantglobal = new ArticuloCantidadGlobal();
        
        $cantglobal->articulo_id = $articulo->id;
        $cantglobal->cantidad = 0;

        $cantglobal->save();

        if($request->has('imagen-principal')){
            $file = $request->file('imagen-principal');
            $destinationPath = 'articulos/'.$articulo->id;
            $file->move($destinationPath,'imagen-principal.'.$file->getClientOriginalExtension());
            $articulo->imagen = 'imagen-principal.'.$file->getClientOriginalExtension();
        }

        if($request->has('imagen-secundaria')){    
            foreach ($request->file('imagen-secundaria') as $file) {
                
                $imagen = new ArticulosImagenes();
                $imagen->articulo_id = $articulo->id;
                $imagen->archivo = '';
                $imagen->save();

                $name = 'imagen-'.$imagen->id.'.'.$file->extension();
                $file->move(public_path().'/articulos/'.$articulo->id, $name);  
                
                $imagen->archivo = $name;
                $imagen->update();
            }
        }

        $articulo->update();

        return redirect()->back()->with('success','Se creo el articulo '.$articulo->nombre.' con exito!');
    }


    public function modificar($id){

        $articulo = Articulos::
            select('articulos.*','categorias.valor as categoria','subcategorias.valor as subcategoria')
            ->join('subcategorias','subcategorias.id','=','articulos.subcategoria_id')
            ->join('categorias','categorias.id','=','articulos.categoria_id')
            ->where('articulos.id','=',$id)
            ->first();

        $imagenes = ArticulosImagenes::where('articulo_id','=',$id)->get();

        if($articulo == null){
            return redirect()->back()->with('error','Error al cargar la vista!');
        } 
        $categorias = Categorias::all();
        $subcategorias = Subcategorias::all();

        return view('almacen.articulos.modificar')
            ->with('articulo',$articulo)
            ->with('imagenes',$imagenes)
            ->with('subcategorias',$subcategorias)
            ->with('categorias',$categorias)
            ->with('titulo','Modificar el articulo: '.$articulo->nombre)
        ;


    }

    public function actualizar(Request $request){

        $validate = $request->validate([
            'id' => 'required',
            'categoria' => 'required',
            'subcategoria' => 'required',
            'nombre' => 'required'
        ]);

        //1) Actualizar la informacion del registro
        $articulo = Articulos::findOrFail($request->id);


        $articulo->nombre = $request->nombre;
        $articulo->categoria_id = $request->categoria;
        $articulo->subcategoria_id = $request->subcategoria;


        //si se subio una nueva imagen como principal, eliminar la actual y subir la nueva
        if($request->has('imagen-principal')){

            if($articulo->imagen != ''){
                if(file_exists(public_path().'/articulos/'.$articulo->id.'/'.$articulo->imagen))
                    unlink(public_path().'/articulos/'.$articulo->id.'/'.$articulo->imagen);
            }

            $file = $request->file('imagen-principal');
            $destinationPath = 'articulos/'.$articulo->id;
            $file->move($destinationPath,'imagen-principal.'.$file->getClientOriginalExtension());
            $articulo->imagen = 'imagen-principal.'.$file->getClientOriginalExtension();
        }

        $articulo->update();

        // revisar cuales son las imagenes que se busca eliminar
        if($request->has('old_img_ids')){
            foreach ($request->old_img_ids as $id => $val) {
                if(is_array($val)){

                    $oldimg = ArticulosImagenes::find($id);
                    
                    if(file_exists(public_path().'/articulos/'.$articulo->id.'/'.$oldimg->archivo))
                        unlink(public_path().'/articulos/'.$articulo->id.'/'.$oldimg->archivo);

                    $oldimg->delete();
                }
            }

        }

        //subir las imagenes secundarias correspondientes
        if($request->has('imagen-secundaria')){    
            foreach ($request->file('imagen-secundaria') as $file) {
                
                $imagen = new ArticulosImagenes();
                $imagen->articulo_id = $articulo->id;
                $imagen->archivo = '';
                $imagen->save();

                $name = 'imagen-'.$imagen->id.'.'.$file->extension();
                $file->move(public_path().'/articulos/'.$articulo->id, $name);  
                
                $imagen->archivo = $name;
                $imagen->update();
            }
        }




        return redirect()->back()->with('success','Se actualizo correctamente el articulo');
    }

}
