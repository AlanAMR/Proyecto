<?php

use Illuminate\Database\Seeder;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // template1
        DB::table('template')->insert([
            'nombre' => 'plantilla1',
            'archivo' => 'templates.template1.index'
        ]);

        DB::table('template_descripcion')->insert([
            'template_id' => '1',
            'imagen' => 'imagen1.jpg',
            'descripcion' => 'descripcion',
            'tipo' => 'Diseño Web'
        ]);

        // template2
        DB::table('template')->insert([
            'nombre' => 'plantilla2',
            'archivo' => 'templates.template2.index'
        ]);

        DB::table('template_descripcion')->insert([
            'template_id' => '2',
            'imagen' => 'imagen2.jpg',
            'descripcion' => 'descripcion',
            'tipo' => 'Desarrollo'
        ]);

        // template3
        DB::table('template')->insert([
            'nombre' => 'plantilla3',
            'archivo' => 'templates.template3.index'
        ]);

        DB::table('template_descripcion')->insert([
            'template_id' => '3',
            'imagen' => 'imagen3.jpg',
            'descripcion' => 'descripcion',
            'tipo' => 'E-Commerce'
        ]);

        //template4
        DB::table('template')->insert([
            'nombre' => 'plantilla4',
            'archivo' => 'templates.template4.index'
        ]);

        DB::table('template_descripcion')->insert([
            'template_id' => '4',
            'imagen' => 'imagen4.jpg',
            'descripcion' => 'descripcion',
            'tipo' => 'Desarrollo'
        ]);

        //template5
        DB::table('template')->insert([
            'nombre' => 'plantilla5',
            'archivo' => 'templates.template5.index'
        ]);

        DB::table('template_descripcion')->insert([
            'template_id' => '5',
            'imagen' => 'imagen5.jpg',
            'descripcion' => 'descripcion',
            'tipo' => 'Desarrollo'
        ]);

        //template6
        DB::table('template')->insert([
            'nombre' => 'plantilla6',
            'archivo' => 'templates.template6.index'
        ]);

        DB::table('template_descripcion')->insert([
            'template_id' => '6',
            'imagen' => 'imagen6.jpg',
            'descripcion' => 'descripcion',
            'tipo' => 'Desarrollo'
        ]);

        //template7
        DB::table('template')->insert([
            'nombre' => 'plantilla7',
            'archivo' => 'templates.template7.index'
        ]);

        DB::table('template_descripcion')->insert([
            'template_id' => '7',
            'imagen' => 'imagen7.jpg',
            'descripcion' => 'descripcion',
            'tipo' => 'Desarrollo'
        ]);

        //template8
        DB::table('template')->insert([
            'nombre' => 'plantilla8',
            'archivo' => 'templates.template8.index'
        ]);

        DB::table('template_descripcion')->insert([
            'template_id' => '8',
            'imagen' => 'imagen8.jpg',
            'descripcion' => 'descripcion',
            'tipo' => 'Desarrollo'
        ]);

        //template9
        DB::table('template')->insert([
            'nombre' => 'plantilla9',
            'archivo' => 'templates.template9.index'
        ]);

        DB::table('template_descripcion')->insert([
            'template_id' => '9',
            'imagen' => 'imagen9.jpg',
            'descripcion' => 'descripcion',
            'tipo' => 'Desarrollo'
        ]);

        //template3
        DB::table('template')->insert([
            'nombre' => 'plantilla10',
            'archivo' => 'templates.template10.index'
        ]);

        DB::table('template_descripcion')->insert([
            'template_id' => '10',
            'imagen' => 'imagen10.jpg',
            'descripcion' => 'descripcion',
            'tipo' => 'Desarrollo'
        ]);

        //template3
        DB::table('template')->insert([
            'nombre' => 'plantilla11',
            'archivo' => 'templates.template11.index'
        ]);

        DB::table('template_descripcion')->insert([
            'template_id' => '11',
            'imagen' => 'imagen11.jpg',
            'descripcion' => 'descripcion',
            'tipo' => 'Desarrollo'
        ]);

        //template3
        DB::table('template')->insert([
            'nombre' => 'plantilla12',
            'archivo' => 'templates.template12.index'
        ]);

        DB::table('template_descripcion')->insert([
            'template_id' => '12',
            'imagen' => 'imagen12.jpg',
            'descripcion' => 'descripcion',
            'tipo' => 'Desarrollo'
        ]);
    }
}
