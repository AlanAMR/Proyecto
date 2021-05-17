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
		return redirect('/almacen/responsivas');
    }
}
