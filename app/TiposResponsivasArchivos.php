<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TiposResponsivasArchivos extends Model
{

	protected $table = 'tipos_responsivas_archivos';

	protected $guarded = ['id'];

	protected $fillable = ['valor'];

	public $timestamps = false;
}
