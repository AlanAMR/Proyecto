<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioFTP extends Model
{
  protected $table = 'usuarioftp';
  
  protected $guarded = ['id'];

  protected $fillable = [
  		'conexion_id', 
  		'identificador', 
  		'usuario', 
  		'password'
  	];
  
  public $timestamps = false;
}