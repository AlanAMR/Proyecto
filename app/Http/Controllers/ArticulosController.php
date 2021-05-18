<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticulosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function inicio(){
    	
    	$articulos = Articulos::
    		select('almacenes.*','sucursales.nombre as sucursal')
    		->join('sucursales','sucursales.id','=','almacenes.sucursal_id')
    		->where('almacenes.status','!=','0')
    		->get();
    	
    	return view('admin.almacenes.index')
    		->with('almacenes',$almacenes)
    		->with('titulo','Gestion de Almacenes')
    	;
    }
}
