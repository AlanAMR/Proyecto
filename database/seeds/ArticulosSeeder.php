<?php

use Illuminate\Database\Seeder;

class ArticulosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            'valor' => 'Accesorios',
        ]);
        DB::table('categorias')->insert([
            'valor' => 'Audio'
        ]);
        DB::table('categorias')->insert([
            'valor' => 'Computadoras'
        ]);
        DB::table('categorias')->insert([
            'valor' => 'Componentes'
        ]);
        DB::table('categorias')->insert([
            'valor' => 'Consumibles'
        ]);
        DB::table('categorias')->insert([
            'valor' => 'Almacenamiento'
        ]);

        DB::table('subcategorias')->insert([
            'valor' => 'Mouse',
            'categoria_id' => '1'
        ]);
        DB::table('subcategorias')->insert([
            'valor' => 'Teclado',
            'categoria_id' => '1'
        ]);	
        DB::table('subcategorias')->insert([
            'valor' => 'Cables',
            'categoria_id' => '1'
        ]);
        DB::table('subcategorias')->insert([
            'valor' => 'Adaptadores',
            'categoria_id' => '1'
        ]);
        DB::table('subcategorias')->insert([
            'valor' => 'Bases',
            'categoria_id' => '1'
        ]);
        DB::table('subcategorias')->insert([
            'valor' => 'Soportes',
            'categoria_id' => '1'
        ]);
        DB::table('subcategorias')->insert([
            'valor' => 'Sillas',
            'categoria_id' => '1'
        ]);
        DB::table('subcategorias')->insert([
            'valor' => 'Audifonos',
            'categoria_id' => '2'
        ]);
        DB::table('subcategorias')->insert([
            'valor' => 'Bocinas',
            'categoria_id' => '2'
        ]);
        DB::table('subcategorias')->insert([
            'valor' => 'Microfonos',
            'categoria_id' => '2'
        ]);
        DB::table('subcategorias')->insert([
            'valor' => 'Amplificadores',
            'categoria_id' => '2'
        ]);


        DB::table('articulos')->insert([
            'subcategoria_id' => '1',
            'categoria_id' => '1',
            'nombre' => 'Mouse 1',
            'imagen' => 'principal.png'
        ]);	
        DB::table('articulos')->insert([
            'subcategoria_id' => '2',
            'categoria_id' => '1',
            'nombre' => 'Teclado 1',
            'imagen' => ''
		]);
        DB::table('articulos')->insert([
            'subcategoria_id' => '3',
            'categoria_id' => '1',
            'nombre' => 'Convertidor 1',
            'imagen' => ''
        ]);
    }
}
