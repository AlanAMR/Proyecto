<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{
    protected $table = 'empresas';
  
	protected $guarded = ['id'];

	protected $fillable = [
			'nombre'
		];

	public $timestamps = false;
}
