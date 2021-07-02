<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioVPN extends Model
{
  protected $table = 'usuariovpn';
  
  protected $guarded = ['id'];

  protected $fillable = [
  		'conexion_id', 
  		'identificador', 
  		'usuario', 
  		'password'
  	];
  
  public $timestamps = false;
}