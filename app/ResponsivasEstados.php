<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResponsivasEstados extends Model
{
  protected $table = 'responsivas_estados';
  protected $guarded = ['id'];
  protected $fillable = ['valor'];
  public $timestamps = false;
}