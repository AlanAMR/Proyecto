<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SugerenciasCelularesMarcas extends Model
{
  protected $table = 'sugerenciascelularesmarcas';
  protected $guarded = ['id'];
  protected $fillable = ['valor'];
  public $timestamps = false;
}