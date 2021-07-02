<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puestos extends Model
{
    protected $table = 'puesto';
  
	protected $guarded = ['id'];

	protected $fillable = [
			'area_id',
			'valor'
		];

	public $timestamps = false;
}
