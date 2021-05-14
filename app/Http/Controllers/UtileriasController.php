<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UtileriasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function redireccionRol ()
    {
    	switch (Auth::user()->rol_id) {
    		case '1':
    			return redirect('/almacen/responsivas');
    			break;
    		
    		default:
    			return redirect('/');
    			break;
    	}
    }
}
