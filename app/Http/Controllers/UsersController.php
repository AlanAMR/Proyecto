<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Roles;

use App\RolesUsuarios;
class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){

        $usuarios = User::
            select('users.*','roles.valor as rol')
            ->join('rolesusuarios','rolesusuarios.usuario_id','=','users.id')
            ->join('roles','roles.id','=','rolesusuarios.rol_id')
            ->where('users.status','!=','0')
            ->get()
            ;

        return view('usuarios.index')
            ->with('titulo','Administracion de Usuarios')
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

    public function modificar($id){
        
        $usuario = User::
            select('users.*','roles.valor as rol')
            ->join('rolesusuarios','rolesusuarios.usuario_id','=','users.id')
            ->join('roles','roles.id','=','rolesusuarios.rol_id')
            ->where('users.id','=',$id)
            ->first()
            ;
        $roles = Roles::all();

        if($usuario == null)
            return redirect()->back()->with('error','Usuario no encontrado');

        return view('usuarios.modificar')
            ->with('titulo','Modificar Usuario: '.$usuario->name)
            ->with('roles',$roles)
            ->with('usuario',$usuario);



    }

    public function actualizar(Request $request){
        
        $validate = $request->validate([
            "id" => "required",
            "nombre" => "required",
            "nickname" => "required",
            "rol" => "required",
            "status" => "required"
        ]);


        $cambiarpass = false;

        if($request->password != ""){
            if($request->password == $request->confirmpassword)
            {
                $cambiarpass = true;
            }
        }



        $user = User::findOrFail($request->id);

        $user->name = $request->nombre;
        $user->nickname = $request->nickname;
        $user->status = $request->status;

        if ($cambiarpass) {
            $user->password = bcrypt($request->password);
        }

        $user->update();

        $rolusuario = RolesUsuarios::where('usuario_id','=',$user->id)->first();

        $rolusuario->rol_id = $request->rol;

        $rolusuario->update();



        if($cambiarpass)
            return redirect()->back()->with('success','Usuario actualizado, Contraseña actualizada');

        return redirect()->back()->with('success','Usuario actualizado');
    }    

    public function eliminar(Request $request){

        $validate = $request->validate([
            "id" => "required"
        ]);
        
        $user = User::findOrFail($request->id);
        $user->status = 0;
        $user->update();

        return response()->json(["Status" => "OK"]);
    }
}