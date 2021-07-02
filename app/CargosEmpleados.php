<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CargosEmpleados extends Model
{
    //

    protected $table = 'cargoempleado';
  
	protected $guarded = ['id'];

	protected $fillable = [
			'empleado_id',
            'cargo',
            'sueldo',
            'comienzo',
            'finaliza',
            'horario',
            'status'
		];

	public $timestamps = false;
}
