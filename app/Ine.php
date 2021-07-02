<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ine extends Model
{
    protected $table = 'ine';
  
	protected $guarded = ['id'];

	protected $fillable = [
			'clave_elector',
			'curp',
			'anio_registro',
			'nacimiento',
			'seccion',
			'vigencia',
			'comprobante'
		];

	public $timestamps = false;
}
