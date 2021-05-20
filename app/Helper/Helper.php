<?php

namespace App\Helper;

Use App\Roles;
use Illuminate\Support\Facades\Auth;


class Helper
{
	public function verifysession(){

		if (!session()->has('roles')) {
    		
    		$rol = Roles::
            select('roles.valor as valor')
	            ->join('rolesusuarios','rolesusuarios.rol_id','=','roles.id')
	            ->where('rolesusuarios.usuario_id','=',1)
	            ->get()
            ;
            session()->forget('roles');
            session()->put('roles', $rol);
		}

		if (session()->get('roles') == "[]") {
            
            session()->forget('roles');
            session()->put('roles', ['Rol no definido']);
        }

	}
}