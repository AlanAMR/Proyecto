<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemplatePagina extends Model
{
    //
  protected $table = 'template_pagina';
  protected $fillable = [
  							'id', 
  							'nombre',
  							'archivo'
  						];
  protected $guarded = ['id'];
  public $timestamps = false;
}
