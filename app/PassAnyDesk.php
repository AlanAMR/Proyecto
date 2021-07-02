<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PassAnyDesk extends Model
{
  protected $table = 'passanydesk';
  protected $guarded = ['id'];
  protected $fillable = [
  		'equipo_id',
  		'tipo',
  		'identificador',
  		'anydesk',
  		'password'
	];
  public $timestamps = false;
}
