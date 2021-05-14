<?php

use Illuminate\Database\Seeder;

class TiposInsumosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_insumos')->insert(['valor' => 'Laptop']);
        DB::table('tipos_insumos')->insert(['valor' => 'Celular']);
        DB::table('tipos_insumos')->insert(['valor' => 'Chip']);
        DB::table('tipos_insumos')->insert(['valor' => 'Monitor']);
        DB::table('tipos_insumos')->insert(['valor' => 'Accesorio']);
    }
}
