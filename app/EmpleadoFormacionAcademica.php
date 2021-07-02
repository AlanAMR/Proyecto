<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpleadoFormacionAcademica extends Model
{
    protected $table = 'formacionacademica';
  
	protected $guarded = ['id'];

	protected $fillable = [
			'empleado_id',
			'tipo',
			'valor',
			'comprobante'
		];

	public $timestamps = false;
}
