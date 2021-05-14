<?php

use Illuminate\Database\Seeder;

class ResponsivasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Resposivas de ejemplo:
        /*
        DB::table('responsivas')->insert([
            'usuario_solicita' => '1',
            'usuario_autoriza' => '2',
            'usuario_entrega' => '3',
            'status' => '1'
        ]);        

        DB::table('responsivas')->insert([
            'usuario_solicita' => '2',
            'usuario_autoriza' => '1',
            'usuario_entrega' => '3',
            'status' => '1'
        ]);

        DB::table('responsivas')->insert([
            'usuario_solicita' => '3',
            'usuario_autoriza' => '2',
            'usuario_entrega' => '1',
            'status' => '1'
        ]);        

        // Resposivas de ejemplo:

        DB::table('responsivas')->insert([
            'usuario_solicita' => '1',
            'usuario_autoriza' => '2',
            'usuario_entrega' => '3',
            'status' => '1'
        ]);

        DB::table('responsivas')->insert([
            'usuario_solicita' => '1',
            'usuario_autoriza' => '2',
            'usuario_entrega' => '3',
            'status' => '2'
        ]);

        DB::table('responsivas')->insert([
            'usuario_solicita' => '1',
            'usuario_autoriza' => '2',
            'usuario_entrega' => '3',
            'status' => '3'
        ]);
    
        */
        DB::table('responsivas_movimientos')->insert([
            'valor' => 'Aceptada'
        ]);

        DB::table('responsivas_movimientos')->insert([
            'valor' => 'Cancelada'
        ]);

        DB::table('responsivas_movimientos')->insert([
            'valor' => 'Pendiente'
        ]);

        DB::table('tipos_responsivas_archivos')->insert([
            'valor' => 'PDF Generado automaticamente',
        ]);

        DB::table('tipos_responsivas_archivos')->insert([
            'valor' => 'Documento de evidencia',
        ]);

        DB::table('tipos_responsivas_archivos')->insert([
            'valor' => 'Imagen',
        ]);

        DB::table('tipos_responsivas_archivos')->insert([
            'valor' => 'PDF',
        ]);

        DB::table('tipos_responsivas_archivos')->insert([
            'valor' => 'Otro archivo',
        ]);
    }
}
