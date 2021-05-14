<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SugerenciasCelularesCompanias extends Model
{
  protected $table = 'sugerenciascelularescompanias';
  protected $guarded = ['id'];
  protected $fillable = ['valor'];
  public $timestamps = false;
}