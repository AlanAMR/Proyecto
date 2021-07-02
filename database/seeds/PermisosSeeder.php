<?php

use Illuminate\Database\Seeder;

class PermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('permisos')->insert([
            'tabla' => 'Roles',
            'tipo' => 'Administrador',
            'identificador' => 'Administrador'
        ]);

        DB::table('permisos')->insert([
            'tabla' => 'Roles',
            'tipo' => 'Rol',
            'identificador' => 'Almacen'
        ]);

        DB::table('permisos')->insert([
            'tabla' => 'Roles',
            'tipo' => 'Rol',
            'identificador' => 'Sistemas'
        ]);

        DB::table('permisos')->insert([
            'tabla' => 'Roles',
            'tipo' => 'Rol',
            'identificador' => 'RH'
        ]);

        DB::table('permisos')->insert([
            'tabla' => 'Roles',
            'tipo' => 'Rol',
            'identificador' => 'Contabilidad'
        ]);

        DB::table('permisos')->insert([
            'tabla' => 'Horarios',
            'tipo' => 'Permiso',
            'identificador' => 'verhorarios'
        ]);

        DB::table('permisos')->insert([
            'tabla' => 'Horarios',
            'tipo' => 'Permiso',
            'identificador' => 'crearhorarios'
        ]);

        DB::table('permisos')->insert([
            'tabla' => 'Horarios',
            'tipo' => 'Permiso',
            'identificador' => 'modificarhorarios'
        ]);

        DB::table('permisos')->insert([
            'tabla' => 'Horarios',
            'tipo' => 'Permiso',
            'identificador' => 'eliminarhorarios'
        ]);

        DB::table('permisos')->insert([
            'tabla' => 'test4',
            'tipo' => 'test4',
            'identificador' => 'test4'
        ]);

        
        DB::table('rolesusuarios')->insert([
            'rol_id' => '1',
            'usuario_id' => '1'
        ]);

        DB::table('rolesusuarios')->insert([
            'rol_id' => '1',
            'usuario_id' => '2'
        ]);

        DB::table('rolesusuarios')->insert([
            'rol_id' => '4',
            'usuario_id' => '3'
        ]);

        DB::table('rolesusuarios')->insert([
            'rol_id' => '4',
            'usuario_id' => '4'
        ]);

        DB::table('rolesusuarios')->insert([
            'rol_id' => '4',
            'usuario_id' => '5'
        ]);

        DB::table('rolesusuarios')->insert([
            'rol_id' => '4',
            'usuario_id' => '6'
        ]);

        DB::table('rolesusuarios')->insert([
            'rol_id' => '4',
            'usuario_id' => '7'
        ]);

        DB::table('rolesusuarios')->insert([
            'rol_id' => '4',
            'usuario_id' => '8'
        ]);

        DB::table('rolesusuarios')->insert([
            'rol_id' => '4',
            'usuario_id' => '9'
        ]);

        DB::table('rolesusuarios')->insert([
            'rol_id' => '4',
            'usuario_id' => '10'
        ]);

        DB::table('rolesusuarios')->insert([
            'rol_id' => '4',
            'usuario_id' => '11'
        ]);

        DB::table('rolesusuarios')->insert([
            'rol_id' => '4',
            'usuario_id' => '12'
        ]);


        // Permisos Para las rutas de usuarios

        DB::table('permisos')->insert([
            'tabla' => 'Users',
            'tipo' => 'Permiso',
            'identificador' => 'verusuarios'
        ]);


        DB::table('permisos')->insert([
            'tabla' => 'Users',
            'tipo' => 'Permiso',
            'identificador' => 'modificarusuarios'
        ]);

        DB::table('permisos')->insert([
            'tabla' => 'Users',
            'tipo' => 'Permiso',
            'identificador' => 'cambiarestadousuarios'
        ]);

        DB::table('permisos')->insert([
            'tabla' => 'Users',
            'tipo' => 'Permiso',
            'identificador' => 'eliminarusuarios'
        ]);

        //Permisos para las rutas de empresas
        DB::table('permisos')->insert([
            'tabla' => 'Empresas',
            'tipo' => 'Permiso',
            'identificador' => 'verempresas'
        ]);


        DB::table('permisos')->insert([
            'tabla' => 'Empresas',
            'tipo' => 'Permiso',
            'identificador' => 'crearempresas'
        ]);


        DB::table('permisos')->insert([
            'tabla' => 'Users',
            'tipo' => 'Permiso',
            'identificador' => 'modificarempresas'
        ]);


        DB::table('permisos')->insert([
            'tabla' => 'Users',
            'tipo' => 'Permiso',
            'identificador' => 'eliminarempresas'
        ]);

        //Permisos para las rutas de areas. 

        DB::table('permisos')->insert([
            'tabla' => 'Areas',
            'tipo' => 'Permiso',
            'identificador' => 'verareas'
        ]);

        DB::table('permisos')->insert([
            'tabla' => 'Areas',
            'tipo' => 'Permiso',
            'identificador' => 'crearareas'
        ]);

        DB::table('permisos')->insert([
            'tabla' => 'Areas',
            'tipo' => 'Permiso',
            'identificador' => 'modificarareas'
        ]);


        DB::table('permisos')->insert([
            'tabla' => 'Areas',
            'tipo' => 'Permiso',
            'identificador' => 'eliminarareas'
        ]);


        // Permisos para las rutas de puestos. 

        DB::table('permisos')->insert([
            'tabla' => 'Puestos',
            'tipo' => 'Permiso',
            'identificador' => 'verpuestos'
        ]);


        DB::table('permisos')->insert([
            'tabla' => 'Puestos',
            'tipo' => 'Permiso',
            'identificador' => 'crearpuestos'
        ]);

        DB::table('permisos')->insert([
            'tabla' => 'Puestos',
            'tipo' => 'Permiso',
            'identificador' => 'modificarpuestos'
        ]);
        DB::table('permisos')->insert([
            'tabla' => 'Puestos',
            'tipo' => 'Permiso',
            'identificador' => 'eliminarpuestos'
        ]);

        // Permisos para las rutas de sucursales. 

        DB::table('permisos')->insert([
            'tabla' => 'Sucursales',
            'tipo' => 'Permiso',
            'identificador' => 'versucursales'
        ]);

        DB::table('permisos')->insert([
            'tabla' => 'Sucursales',
            'tipo' => 'Permiso',
            'identificador' => 'crearsucursales'
        ]);


        DB::table('permisos')->insert([
            'tabla' => 'Sucursales',
            'tipo' => 'Permiso',
            'identificador' => 'modificarsucursales'
        ]);

        DB::table('permisos')->insert([
            'tabla' => 'Sucursales',
            'tipo' => 'Permiso',
            'identificador' => 'eliminarsucursales'
        ]);

    }
}
