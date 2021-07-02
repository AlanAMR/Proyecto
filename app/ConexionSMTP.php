<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConexionSMTP extends Model
{
    //
    protected $table = 'conexionesmtp';
  
	protected $guarded = ['id'];

	protected $fillable = [
	            'servidor_id',
	            'identificador',
	            'dominio',
	            'protocolo_acceso',
	            'servidor_entrante',
	            'servidor_saliente',
	            'puerto_entrada',
	            'puerto_salida',
	            'cifrado_entrante',
	            'cifrado_saliente'
	  		];
	  
	public $timestamps = false;
}
