<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Template;
use App\TemplatePagina;


class TemplateController extends Controller
{
    public function __construct()
    {
    	//
    }
    //
    public function index(){
    	
    	$titulo = "Templates";

    	$templates = Template::all();
    	
    	return view('templates.index')
    		->with('templates',$templates)
    		->with('titulo',$titulo)
    	;
    }


    public function vertemplate($nombre){

    	$template = Template::
    		where('nombre','=',$nombre)
    		->first();


    	$titulo = "Ejemplo: ".$template->nombre;

    	return view($template->archivo)
    		->with('template',$template)
    		->with('titulo',$titulo)
    	;
    }

    public function templatepagina($nombre,$seccion){

    	$template = Template::
    		where('nombre','=',$nombre)
    		->first();
    	$templatepagina = TemplatePagina::
    		where('template_id','=',$template->id)
            ->where('nombre','=',$seccion)
    		->first();


    	$titulo = "Ejemplo: ".$templatepagina->nombre;

    	return view($templatepagina->archivo)
    		->with('template',$template)
    		->with('titulo',$titulo)
    	;
    }
}
