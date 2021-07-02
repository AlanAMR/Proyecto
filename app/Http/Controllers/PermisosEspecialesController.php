<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PermisosEspeciales;
use App\User;
use App\Permisos;
use DB;


class PermisosEspecialesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inicio(){

    	$permisos = PermisosEspeciales::
    		select('users.name as nombre','permisos.tabla as tabla','permisos.tipo as tipo','permisos.identificador as identificador','permisosespeciales.id as id')
            ->join('users','users.id','=','permisosespeciales.usuario_id')
            ->join('permisos','permisos.id','=','permisosespeciales.permiso_id')
            ->get();

    	return view('admin.permisos.index')
    		->with('titulo','Listado de Permisos Especiales.')
    		->with('permisos',$permisos)
    	;
    }


    public function nuevo(){
        $usuarios = User::where('status','!=','0')->get();
        $permisos = Permisos::all();

        return view('admin.permisos.nuevo')
            ->with('titulo','Nuevo permiso especial.')
            ->with('usuarios',$usuarios)
            ->with('permisos',$permisos)
            ;
    }

    public function crear(Request $request){

        $validate = $request->validate([
            'usuario' => 'required',
            'permiso' => 'required'
        ]);


        DB::beginTransaction();

        try{

            $peresp = new PermisosEspeciales();

            $peresp->usuario_id = $request->usuario;
            $peresp->permiso_id = $request->permiso;

            $peresp->save();

            DB::commit();
        }catch(Exception $ex){
            DB::rollBack();
            return redirect()->back()->with('error','No se pudo añadir el permiso');
        }

        return redirect('/administracion/permisos')->with('success','Permiso añadido con exito');
    }

    public function eliminar(Request $request){

        $validate = $request->validate([
            'id' => 'required'
            ]);

        try{

            $permiso = PermisosEspeciales::findOrFail($request->id);
            $permiso->delete();
            return redirect('/administracion/permisos')->with('success','Permiso revocado con exito');
        }catch(Exception $ex){
            return redirect('/administracion/permisos')->with('error','No se pudo revocar el permiso');
        }



    }

}
