<?php

use Illuminate\Database\Seeder;

class SugerenciasCelularesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sugerenciascelularesmarcas')->insert([
            'valor' => 'Huawei'
        ]);         

        DB::table('sugerenciascelularesmarcas')->insert([
            'valor' => 'Xiaomi'
        ]);         

        DB::table('sugerenciascelularesmarcas')->insert([
            'valor' => 'Motorola'
        ]);         

        // Sugerencias de marcas de laptops

        DB::table('sugerenciascelularesmodelos')->insert([
            'valor' => 'Moto E6'
        ]);

        DB::table('sugerenciascelularesmodelos')->insert([
            'valor' => 'Moto G5'
        ]);
    }
}
