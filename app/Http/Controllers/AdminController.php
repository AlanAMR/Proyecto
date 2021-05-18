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
        // faltan los middleware para validar el rol del usuario
        // $this->middleware('tienerolde...');
    }
    //
    public function inicio(){
		return view('admin.index')
    		->with('titulo','Administracion')
    	;    	
    }

    public function sucursales(){
    	
    	$sucursales = Sucursales::
    		select('sucursales.*','empresas.nombre as empresa')
    		->join('empresas','empresas.id','=','sucursales.empresa_id')
    		->get()
    		;

    	return view('admin.sucursales')
    		->with('sucursales',$sucursales)
    		->with('titulo','Gestion de Sucursales')
    	;
    }
}
