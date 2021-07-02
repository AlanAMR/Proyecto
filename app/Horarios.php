<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horarios extends Model
{
    protected $table = 'horarios';
  
	protected $guarded = ['id'];

	protected $fillable = [
			'identificador',
			'hora_inicio',
			'hora_fin',
			'dias',
			'status'
		];

	public $timestamps = false;
}
