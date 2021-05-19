<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected $table = 'categorias';
  
	protected $guarded = ['id'];

	protected $fillable = [
			'valor'
		];

	public $timestamps = false;
}
