<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    protected $table = 'empleado';
  
	protected $guarded = ['id'];

	protected $fillable = [
			'ine_id',
			'rfc',
			'direccion_id',
			'user_id',
			'clave',
			'nombre',
			'edad',
			'telefono1',
			'telefono2',
			'correo',
			'nss'
		];

	public $timestamps = false;
}
