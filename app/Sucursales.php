<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sucursales extends Model
{
    protected $table = 'sucursales';
  
	protected $guarded = ['id'];

	protected $fillable = [
			'nombre',
			'ubicacion',
			'empresa_id'
		];

	public $timestamps = false;
}
