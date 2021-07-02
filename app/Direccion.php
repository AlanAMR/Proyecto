<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $table = 'direccion';
  
	protected $guarded = ['id'];

	protected $fillable = [
			'pais',
			'ciudad',
			'estado',
			'codigo_postal',
			'calle',
			'numero_exterior',
			'numero_interior',
			'comprobante'
		];

	public $timestamps = false;
}
