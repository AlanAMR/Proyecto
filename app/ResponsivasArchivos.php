<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResponsivasArchivos extends Model
{

	protected $table = 'responsivas_archivos';

	protected $guarded = ['id'];

	protected $fillable = ['responsiva_id','nombre', 'ruta','tipo'];

	public $timestamps = false;
}
