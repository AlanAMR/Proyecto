<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Roles;
use App\Permisos;
use App\PermisosRoles;
use App\RolesUsuarios;
use DB;


class RolesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	
    	$roles = Roles::all();

    	return view('admin.roles.index')
    		->with('titulo','Administracion de Roles')
    		->with('roles',$roles);
    }

    public function ver($id){

    	$rol = Roles::findOrFail($id);
    	
    	$permisos = PermisosRoles::
    		select('permisos.*')
    		->join('permisos','permisosroles.permiso_id','=','permisos.id')
    		->where('permisosroles.rol_id','=',$rol->id)
    		->get();

    	return view('admin.roles.ver')
    		->with('titulo','Rol: '.$rol->valor)
    		->with('rol',$rol)
    		->with('permisos',$permisos)
    		;
    }

    public function nuevo(){

    	$permisos = Permisos::all();

    	return view('admin.roles.nuevo')
    		->with('titulo','Nuevo Rol')
    		->with('permisos',$permisos)
    		;
    }

    public function crear(Request $request){
    	$validate = $request->validate([
    		'nombre' => 'required|unique:roles,valor'
    	]);


    	DB::beginTransaction();

    	try{

    		$rol = new Roles();
    		$rol->valor = $request->nombre;
    		$rol->save();
    		if($request->has('permiso')){
	    		foreach ($request->permiso as $id => $value) {
	    			
	    			$permiso = new PermisosRoles();
	    			$permiso->permiso_id = $id;
	    			$permiso->rol_id = $rol->id;
	    			$permiso->save();
	    		}
    		}

    		DB::commit();
    	
    	}catch(Exception $exception){

    		DB::rollBack();
    		return redirect()->back()->withInput(Input::all())->with('error','Error: '.$ex);
    	}

    	return redirect('administracion/roles')->with('success','Rol añadido con exito!');

    }


    public function modificar($id){

    	$rol = Roles::findOrFail($id);
    	
    	$permisos = Permisos::all();

    	$rolpermisos = PermisosRoles::
    		select('permisos.*')
    		->join('permisos','permisosroles.permiso_id','=','permisos.id')
    		->where('permisosroles.rol_id','=',$rol->id)
    		->get();

    	return view('admin.roles.modificar')
    		->with('titulo','Rol: '.$rol->valor)
    		->with('rol',$rol)
    		->with('permisos',$permisos)
    		->with('rolpermisos',$rolpermisos)
    		;
    }

    public function actualizar(Request $request){

    	$validate = $request->validate([
    		'nombre' => 'required',
    		'id' => 'required'
    	]);


    	DB::beginTransaction();

    	try{



    		$rol = Roles::findOrFail($request->id);

    		if($rol->valor == "Administrador")
    			return redirect()->back()->withInput($request->all())->with('error', 'No se puede modificar el rol de administrador');

    		if (Roles::where('valor', '=', $request->nombre)->where('id','!=',$rol->id)->exists()) {
			   	DB::rollBack();
    			return redirect()->back()->withInput($request->all())->with('error', 'El nombre ya esta en uso');
			}else{
				$rol->valor = $request->nombre;
			}

    		$rol->save();

    		//1) Elimina todos los roles-permisos del rol
    		PermisosRoles::where('rol_id','=',$rol->id)->delete();
    		//2) Añade todos los seleccionados nuevamente 

    		if($request->has('permiso')){
	    		foreach ($request->permiso as $id => $value) {
	    			
	    			$permiso = new PermisosRoles();
	    			$permiso->permiso_id = $id;
	    			$permiso->rol_id = $rol->id;
	    			$permiso->save();
	    		}
    		}

    		DB::commit();
    	
    	}catch(Exception $exception){

    		DB::rollBack();
    		return redirect()->back()->withInput($request->all())->with('error','Error: '.$ex);
    	}

    	return redirect()->back()->with('success','Rol Actualizado con exito!');

    }

    public function eliminar(Request $request){

    	$validate = $request->validate([
    		'id' => 'required'
    	]);

    	DB::beginTransaction();


    	try{
    		
    		$rol  = Roles::findOrFail($request->id);

    		if($rol->valor == 'Administrador'){
    			DB::rollBack();
    			return redirect()->back()->withInput($request->all())->with('error','No es posible eliminar el rol de Administrador.');	
    		}

    		if(RolesUsuarios::where('rol_id','=',$rol->id)->count() > 0 ){
    			DB::rollBack();
    			return redirect()->back()->withInput($request->all())->with('error','Aun hay usuarios con ese rol, cambieles el rol.');	
    		}

    		$permisos = PermisosRoles::where('rol_id','=',$rol->id)->delete();
    		$rol->delete();
    	}catch(Exception $ex){
    		DB::rollBack();
    		return redirect()->back()->withInput($request->all())->with('error','Error: '.$ex);
    	}
    	
    	DB::commit();
    	return redirect('administracion/roles')->with('success','Rol eliminado con exito!');
    }



}
