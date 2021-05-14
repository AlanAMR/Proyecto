<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResponsivasInsumos extends Model
{
  protected $table = 'responsivas_insumos';
  protected $guarded = ['id'];
  protected $fillable = ['responsiva_id', 'responsiva_movimiento_id','tipo_insumo_id','insumo_id','comentarios'];
  public $timestamps = false;
}