<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConexionDBMS extends Model
{
    //
    protected $table = 'conexiondbms';
  
	protected $guarded = ['id'];

	protected $fillable = [
	            'servidor_id',
	            'gestor_dbms',
	            'identificador',
	            'servidor',
	            'puerto',
	            'dataset'
	  		];
	  
	public $timestamps = false;
}
