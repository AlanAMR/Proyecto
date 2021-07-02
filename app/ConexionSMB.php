<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConexionSMB extends Model
{
    //
    protected $table = 'conexionessmb';
  
	protected $guarded = ['id'];

	protected $fillable = [
	            'servidor_id',
	            'identificador',
	            'servidor',
	            'puerto'
	  		];
	  
	public $timestamps = false;
}
