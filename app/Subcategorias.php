<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategorias extends Model
{
    protected $table = 'subcategorias';
  
	protected $guarded = ['id'];

	protected $fillable = [
			'valor', 
			'categoria_id', 
		];

	public $timestamps = false;
}
