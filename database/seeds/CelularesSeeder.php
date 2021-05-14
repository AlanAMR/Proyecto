<?php

use Illuminate\Database\Seeder;

class CelularesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('celulares')->insert([
            'marca' => 'Motorola',
            'modelo' => 'Moto G6 Plus',
            'num_serie' => 'ZY322SN2L4',
            'imei' => '351881092029907',
            'color' => 'Blanco'
        ]);

        DB::table('celulares')->insert([
            'marca' => 'Motorola',
            'modelo' => 'Moto G5 Plus',
            'num_serie' => 'ZY224CSHDN',
            'imei' => '351858085398093',
            'color' => 'Negro'
        ]);

        
    }
}
