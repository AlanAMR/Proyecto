<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoUsuarios extends Model
{
    //
  protected $table = 'info_usuario';
  protected $guarded = ['id'];
  protected $fillable = [
  		'usuario_id',
  		'num_empleado',
  		'num_personal',
  		'departamento',
  		'ubicacion',
  		'correo_asignado'
	];
  public $timestamps = false;
}
