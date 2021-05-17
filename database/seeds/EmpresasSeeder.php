<?php

use Illuminate\Database\Seeder;

class EmpresasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('empresas')->insert([
            'nombre' => 'Pro Code'
        ]);

        DB::table('sucursales')->insert([
            'nombre' => 'Matriz',
            'ubicacion' => 'GDL',
            'empresa_id' => '1'
        ]);

        DB::table('sucursales')->insert([
            'nombre' => 'Sucursal DF',
            'ubicacion' => 'Mexico DF',
            'empresa_id' => '1'
        ]);
    }
}
