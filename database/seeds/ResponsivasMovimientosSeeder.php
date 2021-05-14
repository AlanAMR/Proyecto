<?php

use Illuminate\Database\Seeder;

class ResponsivasMovimientosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('responsivas_movimientos')->insert(['valor' => 'Asignado']);
        DB::table('responsivas_movimientos')->insert(['valor' => 'Retirado']);
    }
}
