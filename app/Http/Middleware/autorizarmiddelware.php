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
                where('permisos.identificador','=',$accion)
                ->first();

        if($permiso == null)
            return redirect()->back()->with('error', 'Accion pendiente de revision.');
        
        // 1.1) Hay un rol asociado a la accion?
        $permisorol = PermisosRoles::where('permiso_id','=',$permiso->id)
                ->first();
        if($permisorol == null){
            
            $userid = $request->user()->id;

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
        }else{
            
            // 2)  ¿Obtener el rol del usuario?
            $userid = $request->user()->id;
            
            $rol = Roles::
                select('roles.valor as valor')
                ->join('rolesusuarios','rolesusuarios.rol_id','=','roles.id')
                ->where('rolesusuarios.usuario_id','=',$userid)
                ->where('roles.id','=',$permisorol->rol_id)
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
        return redirect()->back()->with('error', 'No tienes permiso para realizar esta accion.');
    }

}
