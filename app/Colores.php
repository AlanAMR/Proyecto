<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colores extends Model
{
  protected $table = 'colores';
  
  protected $guarded = ['id'];

  protected $fillable = [
  		'valor'
  	];
  
  public $timestamps = false;
}