<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\RolesUsuarios;

class UtileriasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function redireccionRol ()
    {
    	$userid = Auth::user()->id;

    	$rol = RolesUsuarios::
    		select('roles.valor as valor')
    		->join('roles','roles.id','rolesusuarios.rol_id')
    		->where('rolesusuarios.usuario_id','=',$userid)
    		->first()
    		;

    	switch ($rol->valor) {
    		
    		case 'Almacen':
    			return redirect('/almacen-general/articulos');
    			break;

    		case 'Sistemas':
    			return redirect('/almacen/responsivas');
    			break;
    		
    		default:
    			# code...
    			break;
    	}

		return redirect('/administracion');
    }
}
