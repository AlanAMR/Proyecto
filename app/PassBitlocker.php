<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PassBitlocker extends Model
{
  protected $table = 'passbitlocker';
  protected $guarded = ['id'];
  protected $fillable = [
  		'equipo_id',
  		'tipo',
  		'identificador',
  		'clave',
  		'clave_recuperacion'
	];
  public $timestamps = false;
}
