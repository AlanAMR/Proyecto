<?php

use Illuminate\Database\Seeder;

class HorariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('horarios')->insert([
            'identificador' => 'Turno Completo',
            'hora_inicio' => '09:00:00',
            'hora_fin' => '18:00:00',
            'dias' => 'LMIJV',
            'status' => '1',
        ]);

        DB::table('horarios')->insert([
            'identificador' => 'Medio Tiempo Mañana',
            'hora_inicio' => '10:00:00',
            'hora_fin' => '14:00:00',
            'dias' => 'LMIJV',
            'status' => '1',
        ]);

        DB::table('horarios')->insert([
            'identificador' => 'Medio Tiempo Tarde',
            'hora_inicio' => '14:00:00',
            'hora_fin' => '18:00:00',
            'dias' => 'LMIJV',
            'status' => '1',
        ]);
    }
}
