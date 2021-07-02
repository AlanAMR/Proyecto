<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Celulares;
use App\SugerenciasCelularesMarcas;
use App\SugerenciasCelularesModelos;
use App\SugerenciasCelularesCompanias;
use App\Colores;

use App\Exports\ArchivoCelulares;
use Maatwebsite\Excel\Facades\Excel;

class CelularesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function inicio(){
    	
    	$titulo = "Todos los Celulares";
    	$celulares = Celulares::where('status','!=','0')->get();
    	
    	return view('celulares.index')
    		->with('celulares',$celulares)
    		->with('titulo',$titulo)
    	;
    }

    public function nuevo(){

        $sugerencias_celulares_marcas = SugerenciasCelularesMarcas::all();
        $sugerencias_celulares_modelos = SugerenciasCelularesModelos::all();
        $sugerencias_celulares_companias = SugerenciasCelularesCompanias::all();
        $colores = Colores::all();


        return view('celulares.nuevo')
            ->with('sugerencias_celulares_marcas',$sugerencias_celulares_marcas)
            ->with('sugerencias_celulares_modelos',$sugerencias_celulares_modelos)
            ->with('sugerencias_celulares_companias',$sugerencias_celulares_companias)
            ->with('colores',$colores)
        ;
    }


    public function crear(Request $request){

        $valdited = $request->validate([
            'num_serie' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'imei' => 'required',
            'color' => 'required',
            'compania' => 'required'
        ]);

        $celular = new Celulares();

        $celular->num_serie = $request->num_serie;
        $celular->marca = $request->marca;
        $celular->modelo = $request->modelo;
        $celular->imei = $request->imei;
        $celular->color = $request->color;
        $celular->companiamovil = $request->compania;

        $celular->save();

        return redirect('/almacen/celulares/modificar/'.$celular->id)
            ->with('success','Se añadio con exito el celular: '.$celular->num_serie);
    }

    public function modificar($id){

        $celular = Celulares::findOrFail($id);

        $sugerencias_celulares_marcas = SugerenciasCelularesMarcas::all();
        $sugerencias_celulares_modelos = SugerenciasCelularesModelos::all();
        $sugerencias_celulares_companias = SugerenciasCelularesCompanias::all();
        $colores = Colores::all();


        return view('celulares.modificar')
            ->with('celular',$celular)
            ->with('sugerencias_celulares_marcas',$sugerencias_celulares_marcas)
            ->with('sugerencias_celulares_modelos',$sugerencias_celulares_modelos)
            ->with('sugerencias_celulares_companias',$sugerencias_celulares_companias)
            ->with('colores',$colores)
            ->with('titulo','Modificar el celular: '.$celular->num_serie)
        ;

    }
    
    public function actualizar(Request $request){
        
        $valdited = $request->validate([
            'id' => 'required',
            'num_serie' =>'required',
            'marca' => 'required',
            'modelo' => 'required',
            'imei' => 'required',
            'color' => 'required',
            'compania' =>'required'
        ]);

        $celular = Celulares::findOrFail($request->id);

        $celular->num_serie = $request->num_serie;
        $celular->marca = $request->marca;
        $celular->modelo = $request->modelo;
        $celular->imei = $request->imei;
        $celular->color = $request->color;
        $celular->companiamovil = $request->compania;

        $celular->update();

        return redirect()->back()
            ->with('success','Se actualizo la informacion de el celular: '.$celular->num_serie);

    }
    
    public function eliminar(Request $request){

        $validate = $request->validate([
            'id' => 'required'
        ]);

        $celular = Celulares::findOrFail($request->id);
        $celular->status = 0;
        $celular->update();

        return redirect('/almacen/celulares')->with('success','Se elimino con exito el celular: '.$celular->num_serie);
    }


    public function cargar_csv(){
        return view('celulares.cargar_csv')
            ->with('titulo','Cargar Celulares desde Archivo CSV / EXCEL.')
            ;
    }

    public function exportar_plantilla(){
        $export = new ArchivoCelulares;
        return Excel::download($export, 'ejemplo.xlsx');
    }
}
