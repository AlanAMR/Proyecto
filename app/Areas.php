<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Areas extends Model
{
	protected $table = 'areas';
  
	protected $guarded = ['id'];

	protected $fillable = [
			'empresa_id',
			'valor'
		];

	public $timestamps = false;
}
