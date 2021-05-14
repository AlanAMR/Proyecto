<?php

use Illuminate\Database\Seeder;

class SugerenciasLaptopsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sugerenciaslaptopsmarcas')->insert([
            'valor' => 'Lenovo'
        ]);         

        DB::table('sugerenciaslaptopsmarcas')->insert([
            'valor' => 'Asus'
        ]);         

        DB::table('sugerenciaslaptopsmarcas')->insert([
            'valor' => 'HP'
        ]);         

        // Sugerencias de marcas de laptops

        DB::table('sugerenciaslaptopsmodelos')->insert([
            'valor' => 'T440'
        ]);

        DB::table('sugerenciaslaptopsmodelos')->insert([
            'valor' => 'T440S'
        ]);

        //sugerencias de procesadores de laptops

        DB::table('sugerenciaslaptopsprocesadores')->insert([
            'valor' => 'Intel core I5'
        ]);

        DB::table('sugerenciaslaptopsprocesadores')->insert([
            'valor' => 'Intel core I3'
        ]);

        DB::table('sugerenciaslaptopsprocesadores')->insert([
            'valor' => 'Intel core I7'
        ]);


        //sugerencias de sistemas operativos de laptops

        DB::table('sugerenciaslaptopsso')->insert([
            'valor' => 'Windows 10'
        ]);

        DB::table('sugerenciaslaptopsso')->insert([
            'valor' => 'Windows 10 Pro'
        ]);

        // sugerencias de antivirus de laptops 

        DB::table('sugerenciaslaptopsantivirus')->insert([
            'valor' => 'Windows Defender'
        ]);
    }
}
