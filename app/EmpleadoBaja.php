<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpleadoBaja extends Model
{
  protected $table = 'empleadobaja';
  
  protected $guarded = ['id'];

  protected $fillable = [
            'empleado_id',
            'empresa_id',
            'clave_empleado',
            'fecha_solicitud',
            'lote_imss',
            'periodo',
            'parametro',
            'sparh',
            'paterno',
            'materno',
            'nombre',
            'fecha_baja',
            'nss',
            'motivo_baja',
            'registro_patronal',
            'clase',
            'observaciones'
  		];
  
  public $timestamps = false;
}
