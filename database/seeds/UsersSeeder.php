<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Alan Andre Morales Renteria',
            'nickname' => 'Alan.Morales',
            'email' => 'alan.morales.renteria@gmail.com',
            'password' => bcrypt('password'),
            'rol_id' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'Tomas Colsa Gomez',
            'nickname' => 'Tomas.Colsa',
            'email' => 'soporte.ti@telsacel.com',
            'password' => bcrypt('telsa2511'),
            'rol_id' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'Oscar Rojas',
            'nickname' => 'Oscar.Rojas',
            'email' => 'oscar.rojas@telsacel.com',
            'password' => bcrypt('password'),
            'rol_id' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'Marisela Cruz Sanchez',
            'nickname' => 'Marisela.Cruz',
            'email' => 'marisela.cruz@telsacel.com',
            'password' => bcrypt('password'),
            'rol_id' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'Yunuhuen Montesinos Vazques',
            'nickname' => 'Yunuhuen.Montesinos',
            'email' => 'yunuhuen.montesions@telsacel.com',
            'password' => bcrypt('password'),
            'rol_id' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'Jose Eduardo Pascual',
            'nickname' => 'Jose.Pascual',
            'email' => 'jose.pascual@telsacel.com',
            'password' => bcrypt('password'),
            'rol_id' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'Oscar Eugenio Lara Chillas',
            'nickname' => 'Oscar.Eugenio',
            'email' => 'oscar.eugenio@telsacel.com',
            'password' => bcrypt('password'),
            'rol_id' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'Felipe Cortez Iglesias',
            'nickname' => 'Felipe.Cortez',
            'email' => 'felipe.cortez@telsacel.com',
            'password' => bcrypt('password'),
            'rol_id' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'Ulises Romero Ibarra',
            'nickname' => 'Ulises.Romero',
            'email' => 'ulises.romero@telsacel.com',
            'password' => bcrypt('password'),
            'rol_id' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'Amparo Ramiro Rosalino',
            'nickname' => 'Amparo Ramiro',
            'email' => 'amparo.ramiro@telsacel.com',
            'password' => bcrypt('password'),
            'rol_id' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'Daniel de la Cruz Vazques',
            'nickname' => 'Daniel.Cruz',
            'email' => 'daniel.cruz@telsacel.com',
            'password' => bcrypt('password'),
            'rol_id' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'Victor Andres Ahumada Velsquez',
            'nickname' => 'Victor.Ahumada',
            'email' => 'Victor.Ahumada@telsacel.com',
            'password' => bcrypt('password'),
            'rol_id' => 1
        ]);
    }
}
