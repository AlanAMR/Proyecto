<?php

use Illuminate\Database\Seeder;

class EmpleadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cargoempleado')->insert([
            'empleado_id' => '1',
            'cargo' => 'Tecnico de operaciones',
            'sueldo' => '20000',
            'comienzo' => '2020-10-10',
            'finaliza' => null,
            'horario' => 'LMIJV 09:00 - 18:00',
            'status' => '1'
        ]);

        DB::table('cargoempleado')->insert([
            'empleado_id' => '2',
            'cargo' => 'Becario de soporte tecnico',
            'sueldo' => '4800',
            'comienzo' => '2020-10-10',
            'finaliza' => null,
            'horario' => 'LMIJV 14:00 - 18:00',
            'status' => '1'
        ]);
    }
}
