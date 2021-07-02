<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servidores extends Model
{
    protected $table = 'servidores';
  
	protected $guarded = ['id'];

	protected $fillable = [
			'identificador', 
			'num_serie',
			'tipo',
			'propietario',
			'marca',
			'modelo',
			'almacenamineto',
			'ram',
			'procesador',
			'sistema_operativo',
			'antivirus' 
		];

	public $timestamps = false;
}
