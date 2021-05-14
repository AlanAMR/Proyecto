<?php

use Illuminate\Database\Seeder;

class InfoUsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('info_usuario')->insert([
            'usuario_id' => '1',
            'num_empleado' => '1',
            'num_personal' => '33 12 12 12 12',
            'departamento' => 'TI',
            'ubicacion' => 'Guadalajara',
            'correo_asigando' => 'alan.morales@example.com'
        ]);

        DB::table('info_usuario')->insert([
            'usuario_id' => '2',
            'num_empleado' => '2',
            'num_personal' => '33 12 12 12 12',
            'departamento' => 'TI',
            'ubicacion' => 'Guadalajara',
            'correo_asigando' => 'tomas.colsa@example.com'
        ]);

        DB::table('info_usuario')->insert([
            'usuario_id' => '3',
            'num_empleado' => '3',
            'num_personal' => '33 12 12 12 12',
            'departamento' => 'TBA',
            'ubicacion' => 'Guadalajara',
            'correo_asigando' => 'oscar.rojas@example.com'
        ]);

        DB::table('info_usuario')->insert([
            'usuario_id' => '4',
            'num_empleado' => '4',
            'num_personal' => '33 12 12 12 12',
            'departamento' => 'TBA',
            'ubicacion' => 'Guadalajara',
            'correo_asigando' => 'marisela.cruz@example.com'
        ]);

        DB::table('info_usuario')->insert([
            'usuario_id' => '5',
            'num_empleado' => '5',
            'num_personal' => '33 12 12 12 12',
            'departamento' => 'TBA',
            'ubicacion' => 'Guadalajara',
            'correo_asigando' => 'yunuhuen.montesions@example.com'
        ]);

        DB::table('info_usuario')->insert([
            'usuario_id' => '6',
            'num_empleado' => '6',
            'num_personal' => '33 12 12 12 12',
            'departamento' => 'TBA',
            'ubicacion' => 'Guadalajara',
            'correo_asigando' => 'jose.pascual@example.com'
        ]);

        DB::table('info_usuario')->insert([
            'usuario_id' => '7',
            'num_empleado' => '7',
            'num_personal' => '33 12 12 12 12',
            'departamento' => 'TBA',
            'ubicacion' => 'Guadalajara',
            'correo_asigando' => 'oscar.eugenio@example.com'
        ]);

        DB::table('info_usuario')->insert([
            'usuario_id' => '8',
            'num_empleado' => '8',
            'num_personal' => '33 12 12 12 12',
            'departamento' => 'TBA',
            'ubicacion' => 'Guadalajara',
            'correo_asigando' => 'felipe.cortez@example.com'
        ]);

        DB::table('info_usuario')->insert([
            'usuario_id' => '9',
            'num_empleado' => '9',
            'num_personal' => '33 12 12 12 12',
            'departamento' => 'TBA',
            'ubicacion' => 'Guadalajara',
            'correo_asigando' => 'ulises.romero@example.com'
        ]);

        DB::table('info_usuario')->insert([
            'usuario_id' => '10',
            'num_empleado' => '10',
            'num_personal' => '33 12 12 12 12',
            'departamento' => 'TBA',
            'ubicacion' => 'Guadalajara',
            'correo_asigando' => 'amparo.ramiro@example.com'
        ]);

        DB::table('info_usuario')->insert([
            'usuario_id' => '11',
            'num_empleado' => '11',
            'num_personal' => '33 12 12 12 12',
            'departamento' => 'TBA',
            'ubicacion' => 'Guadalajara',
            'correo_asigando' => 'daniel.cruz@example.com'
        ]);

        DB::table('info_usuario')->insert([
            'usuario_id' => '12',
            'num_empleado' => '12',
            'num_personal' => '33 12 12 12 12',
            'departamento' => 'TBA',
            'ubicacion' => 'Guadalajara',
            'correo_asigando' => 'victor.ahumada@example.com'
        ]);
    }
}
