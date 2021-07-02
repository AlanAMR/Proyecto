<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresas;
use App\Sucursales;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function inicio(){
		return view('admin.index')
    		->with('titulo','Administracion')
    	;    	
    }

}
