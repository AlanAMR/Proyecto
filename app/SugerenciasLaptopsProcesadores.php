<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SugerenciasLaptopsProcesadores extends Model
{
  protected $table = 'sugerenciaslaptopsprocesadores';
  protected $guarded = ['id'];
  protected $fillable = ['valor'];
  public $timestamps = false;
}