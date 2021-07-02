<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolesUsuarios extends Model
{
    protected $table = 'rolesusuarios';
  
	protected $guarded = ['id'];

	protected $fillable = [
			'usuario_id', 
			'rol_id', 
		];

	public $timestamps = false;
}
