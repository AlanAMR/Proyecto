<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpleadoPuesto extends Model
{
    protected $table = 'empleadopuesto';
  
	protected $guarded = ['id'];

	protected $fillable = [
			'empleado_id',
			'horario_id',
			'puesto_id',
			'status'
		];

	public $timestamps = false;
}
