<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carpetas extends Model
{
    protected $table = 'carpetas';
  
	protected $guarded = ['id'];

	protected $fillable = [
			'servidor_id',
			'identificador',
			'ruta'
		];

	public $timestamps = false;
}
