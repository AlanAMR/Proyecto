<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConexionRAS extends Model
{
    //
    protected $table = 'conexionesras';
  
	protected $guarded = ['id'];

	protected $fillable = [
	            'servidor_id',
	            'identificador',
	            'tipo',
	            'servidor',
	            'puerto'
	  		];
	  
	public $timestamps = false;
}
