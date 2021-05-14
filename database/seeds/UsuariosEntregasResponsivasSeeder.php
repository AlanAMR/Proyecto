<?php

use Illuminate\Database\Seeder;

class UsuariosEntregasResponsivasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios_entregas_responsivas')->insert([
            'user_id' => '2'
        ]);
    }
}
