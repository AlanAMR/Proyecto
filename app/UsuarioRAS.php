<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioRAS extends Model
{
  protected $table = 'usuarioras';
  
  protected $guarded = ['id'];

  protected $fillable = [
  		'conexion_id', 
  		'identificador', 
  		'usuario', 
  		'password'
  	];
  
  public $timestamps = false;
}