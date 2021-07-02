<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use DB;

use App\EmpleadoBaja;

class HistoricoBajasController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $empleados = EmpleadoBaja::
            select('empleadobaja.*','empresas.nombre as empresa')
            ->leftJoin('empresas','empresas.id','=','empleadobaja.empresa_id')
            ->get();

        return view('rh.historicobajas.index')
            ->with('titulo','Historico de Bajas de Empleados')
            ->with('empleados',$empleados)
            ;
    }


    public function nuevo(){
        
    }

    public function crear(Request $request){

    }

    public function eliminar(Request $request){

    }

    public function cargar_csv(){
        return view('rh.historicobajas.cargar_csv')
            ->with('titulo','Cargar Bajas desde un archivo.');
    }
}
