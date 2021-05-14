<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SugerenciasChipsOperadores extends Model
{
  protected $table = 'sugerenciaschipsoperadores';
  protected $guarded = ['id'];
  protected $fillable = ['valor'];
  public $timestamps = false;
}