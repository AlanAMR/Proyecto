<?php

use Illuminate\Database\Seeder;

class ColoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('colores')->insert(['valor' => 'Negro']);
        DB::table('colores')->insert(['valor' => 'Blanco']);
        DB::table('colores')->insert(['valor' => 'Gris']);
        DB::table('colores')->insert(['valor' => 'Azul']);
        DB::table('colores')->insert(['valor' => 'Marron']);
        DB::table('colores')->insert(['valor' => 'Verde']);
        DB::table('colores')->insert(['valor' => 'Naranja']);
        DB::table('colores')->insert(['valor' => 'Rosa']);
        DB::table('colores')->insert(['valor' => 'Rojo']);
        DB::table('colores')->insert(['valor' => 'Purpura']);
        DB::table('colores')->insert(['valor' => 'Amarillo']);
        DB::table('colores')->insert(['valor' => 'Plateado']);
        DB::table('colores')->insert(['valor' => 'Dorado']);
    }
}
