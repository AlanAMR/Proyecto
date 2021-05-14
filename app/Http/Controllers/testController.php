<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resposiva;

class testController extends Controller
{
    //

    public function index(){
    	
    	$titulo = "Todas las Resposivas";
    	$responsivas = Resposiva::all();
    	
    	return view('test.responsivas')
    		->with('responsivas',$responsivas)
    		->with('titulo',$titulo)
    	;
    }
}
