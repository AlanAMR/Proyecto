<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SugerenciasLaptopsModelos extends Model
{
  protected $table = 'sugerenciaslaptopsmodelos';
  protected $guarded = ['id'];
  protected $fillable = ['valor'];
  public $timestamps = false;
}