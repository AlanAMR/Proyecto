<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticuloCantidadGlobal extends Model
{
    protected $table = 'articuloscantidadglobal';
  
	protected $guarded = ['id'];

	protected $fillable = [
			'articulo_id', 
			'cantidad'
		];

	public $timestamps = false;
}
