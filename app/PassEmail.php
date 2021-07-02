<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PassEmail extends Model
{
  protected $table = 'passemail';
  protected $guarded = ['id'];
  protected $fillable = [
  		'empleado_id',
  		'conexion_id',
  		'identificador',
  		'email',
  		'password'
	];
  public $timestamps = false;

}
