<?php

namespace App\Http\Middleware;

use Closure;
use App\Roles;
use App\RolesUsuarios;
use App\Permisos;
use App\PermisosRoles;
use App\PermisosEspeciales;

class autorizarmiddelware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $accion)
    {   
        // 1) Esta declarado el permiso? 
        $permiso  =  Permisos::
                select('permisos.*','permisosroles.rol_id as rol')
                ->join('permisosroles','permisosroles.permiso_id','=','permisos.id')
                ->where('permisos.identificador','=',$accion)
                ->first();

        if($permiso == null)
            return redirect('/almacen/responsivas')->with('error', 'Accion no establecida en la base de datos.');
        
        // 2)  ¿Obtener el rol del usuario?
        $userid = $request->user()->id;
        
        $rol = Roles::
            select('roles.valor as valor')
            ->join('rolesusuarios','rolesusuarios.rol_id','=','roles.id')
            ->where('rolesusuarios.usuario_id','=',$userid)
            ->where('roles.id','=',$permiso->rol)
            ->first()
            ;

        // ¿Tiene el rol requerido?

        if ($rol != null) {
                return $next($request);
        }

        $rol = Roles::
            select('roles.valor as valor')
            ->join('rolesusuarios','rolesusuarios.rol_id','=','roles.id')
            ->where('rolesusuarios.usuario_id','=',$userid)
            ->where('roles.valor','=','Administrador')
            ->first()
            ;

        // ¿Es Admin? 
        if ($rol != null) {
            return $next($request);
        }

        // 3) ¿Tiene el permiso especial?

        $permisoEspecial = PermisosEspeciales::
            where('usuario_id','=',$userid)
            ->where('permiso_id','=',$permiso->id)
            ->first();

        // ¿Tiene permiso especial para realizar la accion?
        if($permisoEspecial != null){
            return $next($request);   
        }

        // No tiene permiso especial 
        return redirect('/administracion')->with('error', 'No tienes permiso para realizar esta accion.');
    }

}
