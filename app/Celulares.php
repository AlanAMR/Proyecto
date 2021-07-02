<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/*
  Celulares status:
  0 = Baja / Eliminado
  1 = Activo / Stock
  2 = Asignado / En uso
*/

class Celulares extends Model
{
  protected $table = 'celulares';
  
  protected $guarded = ['id'];

  protected $fillable = [
  		'num_serie', 
  		'marca', 
  		'modelo', 
  		'imei',
  		'color',
  		'companiamovil',
  		'status'
  	];
  
  public $timestamps = false;
}