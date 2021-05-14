<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SugerenciasLaptopsMarcas extends Model
{
  protected $table = 'sugerenciaslaptopsmarcas';
  protected $guarded = ['id'];
  protected $fillable = ['valor'];
  public $timestamps = false;
}