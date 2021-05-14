<?php

use Illuminate\Database\Seeder;

class UsuariosAutorizanResponsivasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios_autorizan_responsivas')->insert([
            'user_id' => '3'
        ]);

        DB::table('usuarios_autorizan_responsivas')->insert([
            'user_id' => '4'
        ]);

        DB::table('usuarios_autorizan_responsivas')->insert([
            'user_id' => '5'
        ]);

        DB::table('usuarios_autorizan_responsivas')->insert([
            'user_id' => '6'
        ]);
    }
}
