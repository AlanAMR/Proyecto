<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConexionFTP extends Model
{
    //
    protected $table = 'conexionesftp';
  
	protected $guarded = ['id'];

	protected $fillable = [
	            'servidor_id',
	            'identificador',
	            'servidor',
	            'puerto'
	  		];
	  
	public $timestamps = false;
}
