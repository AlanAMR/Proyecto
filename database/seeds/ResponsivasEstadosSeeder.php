<?php

use Illuminate\Database\Seeder;

class ResponsivasEstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('responsivas_estados')->insert([
            'valor' => 'aceptada'
        ]);

        DB::table('responsivas_estados')->insert([
            'valor' => 'rechazada'
        ]);

        DB::table('responsivas_estados')->insert([
            'valor' => 'pendiente'
        ]);
    }
}
