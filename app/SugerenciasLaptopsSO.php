<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SugerenciasLaptopsSO extends Model
{
  protected $table = 'sugerenciaslaptopsso';
  protected $guarded = ['id'];
  protected $fillable = ['valor'];
  public $timestamps = false;
}