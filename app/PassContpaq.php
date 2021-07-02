<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PassContpaq extends Model
{
    //
    protected $table = 'passcontpaq';
  protected $guarded = ['id'];
  protected $fillable = [
  		'empleado_id',
  		'identificador',
  		'usuario',
  		'password'
	];
  public $timestamps = false;
}
