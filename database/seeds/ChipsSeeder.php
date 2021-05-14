<?php

use Illuminate\Database\Seeder;

class ChipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	
        DB::table('chips')->insert([
            'numero' => '33 2149 2878',
            'sim' => '89520900000116500000',
            'operador' => 'AT&T',
            'plan' => 'AT&T Todo 1499 NEG C MPP',
        ]);

        DB::table('chips')->insert([
            'numero' => '33 1811 0706',
            'sim' => '89520900000118144817',
            'operador' => 'AT&T',
            'plan' => ' AT&Tv3 ConTodoNEG 239 C M',
        ]);
    }
}
