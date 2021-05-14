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
            'color' => 'Blanco',
            'usuario' => 'user',
            'password' =>'',
            'anydesk' => '321 543 765',
            'anydeskpassword' => ''
        ]);

        DB::table('laptops')->insert([
            'marca' => 'Lenovo',
            'modelo' => 'T430s',
            'num_serie' => 'PF00HGGL',
            'procesador' => 'Core I5',
            'sistema_operativo' => 'Windows 7 Pro',
            'antivirus' => 'Microsoft Security Essentials',
            'color' => 'Gris',
            'usuario' => 'user',
            'password' =>'',
            'anydesk' => '645 827 132',
            'anydeskpassword' => ''
        ]);

        DB::table('laptops')->insert([
            'marca' => 'Lenovo',
            'modelo' => 'T430',
            'num_serie' => 'PBY6CYB',
            'procesador' => 'Core I5',
            'sistema_operativo' => 'Windows 7 Pro',
            'antivirus' => 'Microsoft Security Essentials',
            'color' => 'Negro',
            'usuario' => 'user',
            'password' =>'',
            'anydesk' => '123 123 123',
            'anydeskpassword' => ''
        ]);
    }
}
