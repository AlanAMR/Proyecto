<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpleadoDatosEmergencia extends Model
{
    protected $table = 'datosemergencia';
  
	protected $guarded = ['id'];

	protected $fillable = [
			'empleado_id',
			'telefono',
			'parentesco',
			'nombre',
			'direccion'
		];

	public $timestamps = false;
}
