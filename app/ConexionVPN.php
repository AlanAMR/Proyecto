<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConexionVPN extends Model
{
    //
    protected $table = 'conexionesvpn';
  
	protected $guarded = ['id'];

	protected $fillable = [
	            'servidor_id',
	            'servidor',
	            'identificador',
	            'puerto',
	            'cifrado'
	  		];
	  
	public $timestamps = false;
}
