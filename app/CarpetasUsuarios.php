<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarpetasUsuarios extends Model
{
    protected $table = 'carpetasusuarios';
  
	protected $guarded = ['id'];

	protected $fillable = [
			'carpeta_id',
			'usuarioras_id',
			'empleado_id',
			'permisos'
		];

	public $timestamps = false;
}
