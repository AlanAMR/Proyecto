<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PassSisOp extends Model
{
    //

  protected $table = 'passsisop';
  protected $guarded = ['id'];
  protected $fillable = [
  		'equipo_id',
  		'tipo',
  		'sistema',
  		'identificador',
  		'usuario',
  		'password'
	];
  public $timestamps = false;
}
