<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Almacenes extends Model
{
    //
    protected $table = 'almacenes';
  
	protected $guarded = ['id'];

	protected $fillable = [
			'sucursal_id',
			'nombre',
			'ubicacion',
			'status'
		];

	public $timestamps = false;
}
