<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Informacion inicial para la tabla de roles
        DB::table('roles')->insert(['valor' => 'Administrador']);
        DB::table('roles')->insert(['valor' => 'Sistemas']);
        DB::table('roles')->insert(['valor' => 'Almacen']);
        DB::table('roles')->insert(['valor' => 'Empleado']);
    }
}
