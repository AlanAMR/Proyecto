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
			'nombre', 
			'imagen',
			'status'
		];

	public $timestamps = false;
}