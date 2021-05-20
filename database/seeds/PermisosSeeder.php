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
            'tipo' => 'Almacen',
            'identificador' => 'Almacen'
        ]);

        DB::table('permisos')->insert([
            'tabla' => 'test',
            'tipo' => 'test',
            'identificador' => 'test'
        ]);

        DB::table('permisos')->insert([
            'tabla' => 'test1',
            'tipo' => 'test1',
            'identificador' => 'test1'
        ]);

        DB::table('permisos')->insert([
            'tabla' => 'test2',
            'tipo' => 'test2',
            'identificador' => 'test2'
        ]);

        DB::table('permisos')->insert([
            'tabla' => 'test3',
            'tipo' => 'test3',
            'identificador' => 'test3'
        ]);

        DB::table('permisos')->insert([
            'tabla' => 'test4',
            'tipo' => 'test4',
            'identificador' => 'test4'
        ]);

        DB::table('permisosroles')->insert([
            'permiso_id' => '1',
            'rol_id' => '1'
        ]);

        DB::table('permisosroles')->insert([
            'permiso_id' => '2',
            'rol_id' => '1'
        ]);

        DB::table('permisosroles')->insert([
            'permiso_id' => '3',
            'rol_id' => '1'
        ]);

        DB::table('permisosroles')->insert([
            'permiso_id' => '4',
            'rol_id' => '1'
        ]);


        DB::table('rolesusuarios')->insert([
            'rol_id' => '1',
            'usuario_id' => '1'
        ]);

        DB::table('rolesusuarios')->insert([
            'rol_id' => '2',
            'usuario_id' => '1'
        ]);

        DB::table('rolesusuarios')->insert([
            'rol_id' => '3',
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
    }
}
