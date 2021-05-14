<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SugerenciasCelularesModelos extends Model
{
  protected $table = 'sugerenciascelularesmodelos';
  protected $guarded = ['id'];
  protected $fillable = ['valor'];
  public $timestamps = false;
}