<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SugerenciasChipsPlanes extends Model
{
  protected $table = 'sugerenciaschipsplanes';
  protected $guarded = ['id'];
  protected $fillable = ['valor'];
  public $timestamps = false;
}