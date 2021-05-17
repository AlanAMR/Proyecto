<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permisos extends Model
{
  protected $table = 'permisos';
  
  protected $guarded = ['id'];

  protected $fillable = [
  		'tabla',
  		'tipo',
  		'identificador'
  	];
  
  public $timestamps = false;
}
