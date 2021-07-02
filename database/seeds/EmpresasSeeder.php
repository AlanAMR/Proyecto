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
            'nombre' => 'Telsa Solutions'
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

        DB::table('almacenes')->insert([
            'sucursal_id' => '1',
            'nombre' => 'GDL Almacen Principal',
            'ubicacion' => 'GDL'
        ]);

        DB::table('almacenes')->insert([
            'sucursal_id' => '1',
            'nombre' => 'GDL Almacen Secundario',
            'ubicacion' => 'Zapopan'
        ]);

        DB::table('almacenes')->insert([
            'sucursal_id' => '2',
            'nombre' => 'GDL Almacen Principal',
            'ubicacion' => 'GDL'
        ]);

        DB::table('almacenes')->insert([
            'sucursal_id' => '2',
            'nombre' => 'GDL Almacen Secundario',
            'ubicacion' => 'Zapopan'
        ]);
    }
}
