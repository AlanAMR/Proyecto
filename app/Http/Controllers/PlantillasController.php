<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Template;
use App\TemplatePagina;


class PlantillasController extends Controller
{
    public function __construct()
    {
    	//
    }
    //
    public function getDatos(){
        return [
            'titulo' => 'Inicio',
            'organizacion' => 'PRO CODE',
            'logo' => 'img/logo.png',
            'telefono' => '33-3550-5663',
            'email' => 'procodegdl@gmail.com',
            'facebook' => 'https://www.facebook.com/proocode/'
        ]; 
    }

    public function inicio(){
        $datos = self::getDatos();
        $templates = Template::
            select('template.id as id','td.imagen as imagen','td.tipo as tipo','template.nombre as nombre')
            ->join('template_descripcion as td','td.template_id','=','template.id')
            ->get();

        return view('home.demos')
            ->with('seccion','demos')
            ->with('datos',$datos)
            ->with('templates',$templates)
            ;	
    }


    public function ver($id){

    	$template = Template::findOrFail($id);


    	$titulo = "Ejemplo: ".$template->nombre;

    	return view($template->archivo)
    		->with('template',$template)
    		->with('titulo',$titulo)
    	;
    }

    public function pagina($id,$pagina){

    	$template = Template::findOrFail($id);

    	$templatepagina = TemplatePagina::
    		where('template_id','=',$template->id)
            ->where('nombre','=',$pagina)
    		->first();

        if($templatepagina == null){
            return redirect()->back()->with('Error', 'Pagina no encontrada');
        }

    	$titulo = "Ejemplo: ".$templatepagina->nombre;

    	return view($templatepagina->archivo)
    		->with('template',$template)
    		->with('titulo',$titulo)
    	;
    }
}