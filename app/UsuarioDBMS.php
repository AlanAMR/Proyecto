<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioDBMS extends Model
{
  protected $table = 'usuariodbms';
  
  protected $guarded = ['id'];

  protected $fillable = [
  		'dbms_id', 
  		'identificador', 
  		'usuario', 
  		'password'
  	];
  
  public $timestamps = false;
}