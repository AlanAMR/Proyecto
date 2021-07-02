<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticulosImagenes extends Model
{
    protected $table = 'articulosimagenes';
  
	protected $guarded = ['id'];

	protected $fillable = [
			'articulo_id', 
			'archivo'
		];

	public $timestamps = false;
}
