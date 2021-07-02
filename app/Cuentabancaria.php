<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuentabancaria extends Model
{
    protected $table = 'cuentabancaria';
  
	protected $guarded = ['id'];

	protected $fillable = [
			'banco',
			'titular',
			'clabe',
			'comprobante'
		];

	public $timestamps = false;
}
