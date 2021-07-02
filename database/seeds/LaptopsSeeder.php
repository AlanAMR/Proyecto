<?php

use Illuminate\Database\Seeder;

class LaptopsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Informacion inicial para la tabla de laptops
        DB::table('laptops')->insert([
            'marca' => 'Lenovo',
            'modelo' => 'T430',
            'num_serie' => 'PBY6CWM',
            'procesador' => 'Core I5',
            'sistema_operativo' => 'Windows 7 Pro',
            'antivirus' => 'Microsoft Security Essentials',
            'color' => 'Blanco'
        ]);

        DB::table('laptops')->insert([
            'marca' => 'Lenovo',
            'modelo' => 'T430s',
            'num_serie' => 'PF00HGGL',
            'procesador' => 'Core I5',
            'sistema_operativo' => 'Windows 7 Pro',
            'antivirus' => 'Microsoft Security Essentials',
            'color' => 'Gris'
        ]);

        DB::table('laptops')->insert([
            'marca' => 'Lenovo',
            'modelo' => 'T430',
            'num_serie' => 'PBY6CYB',
            'procesador' => 'Core I5',
            'sistema_operativo' => 'Windows 7 Pro',
            'antivirus' => 'Microsoft Security Essentials',
            'color' => 'Negro'
        ]);

        // computadoras
        DB::table('computadoras')->insert([
            'num_serie' => 'CompuTest1',
            'marca' => 'Lenovo',
            'modelo' => 'T430',
            'procesador' => 'Core I5',
            'sistema_operativo' => 'Windows 7 Pro',
            'antivirus' => 'Microsoft Security Essentials'
        ]);


        DB::table('computadoras')->insert([
            'num_serie' => 'CompuTest2',
            'marca' => 'Lenovo',
            'modelo' => 'T430',
            'procesador' => 'Core I5',
            'sistema_operativo' => 'Windows 7 Pro',
            'antivirus' => 'Microsoft Security Essentials'
        ]);

    }
}
