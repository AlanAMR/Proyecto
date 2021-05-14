<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $usuarios = User::all();

        return view('usuarios.index')
            ->with('usuarios',$usuarios); 
    }


    public function ver($id){
        $user = User::findOrFail($id);

        return view('usuarios.ver')
            ->with('usuario',$user);
    }

    public function crear(){

        return view('usuarios.nuevo');
    }

    public function agregar(Request $request){
        $validate = $request->validate([
            "datos" => "required"
        ]);
        return response()->json(["Status" => "Usuario Agregado"]);
    }

    public function modificar(){
        return response()->json(["Vista" => "Modificar"]);
    }

    public function actualizar(Request $request){
        $validate = $request->validate([
            "datos" => "required"
        ]);
        return response()->json(["Status" => "Usuario Actualizado"]);
    }    

    public function eliminar(Request $request){

        $validate = $request->validate([
            "id" => "required"
        ]);
        
        $user = User::findOrFail($request->id);
        $user->rol_id = 1;
        $user->updates();

        return response()->json(["Status" => "OK"]);
    }
}