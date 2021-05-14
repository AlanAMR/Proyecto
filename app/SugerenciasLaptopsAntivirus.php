<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SugerenciasLaptopsAntivirus extends Model
{
  protected $table = 'sugerenciaslaptopsantivirus';
  protected $guarded = ['id'];
  protected $fillable = ['valor'];
  public $timestamps = false;
}