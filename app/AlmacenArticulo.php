<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlmacenArticulo extends Model
{
    protected $table = 'almacenarticulo';
  
	protected $guarded = ['id'];

	protected $fillable = [
			'almacen_id', 
			'articulo_id',
			'cantidad'
		];

	public $timestamps = false;
}
