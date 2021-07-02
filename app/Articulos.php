<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulos extends Model
{
    protected $table = 'articulos';
  
	protected $guarded = ['id'];

	protected $fillable = [
			'subcategoria_id', 
			'categoria_id', 
			'cantidad_global',
			'nombre', 
			'imagen',
			'status'
		];

	public $timestamps = false;
}
