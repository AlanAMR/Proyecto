<?php

use Illuminate\Database\Seeder;

class AreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('areas')->insert([
            'empresa_id' => '1',
            'valor' => 'Administracion'
        ]);

	        DB::table('puesto')->insert([
	            'area_id' => '1',
	            'valor' => 'Director'
	        ]);

        DB::table('areas')->insert([
            'empresa_id' => '1',
            'valor' => 'Recursos Humanos'
        ]);
        	
        	DB::table('puesto')->insert([
	            'area_id' => '2',
	            'valor' => 'Gerente de recursos humanos'
	        ]);

        DB::table('areas')->insert([
            'empresa_id' => '1',
            'valor' => 'Sistemas'
        ]);

        	DB::table('puesto')->insert([
	            'area_id' => '3',
	            'valor' => 'Gerente de sistemas'
	        ]);

        DB::table('areas')->insert([
            'empresa_id' => '1',
            'valor' => 'Operaciones'
        ]);
        	DB::table('puesto')->insert([
	            'area_id' => '4',
	            'valor' => 'Gerente de operaciones'
	        ]);


    }
}
