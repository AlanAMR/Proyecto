<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chips extends Model
{
  protected $table = 'chips';
  
  protected $guarded = ['id'];

  protected $fillable = [
  		'numero', 
  		'sim', 
  		'operador', 
  		'plan',
  		'status'
  	];
  
  public $timestamps = false;
}