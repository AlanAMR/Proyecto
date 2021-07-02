<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/*
  Laptops status:
  0 = Baja / Eliminado
  1 = Activo / Stock
  2 = Asignado / En uso
*/

class Laptops extends Model
{
  protected $table = 'laptops';
  
  protected $guarded = ['id'];

  protected $fillable = [
            'num_serie',
            'marca',
            'modelo',
            'procesador',
            'sistema_operativo',
            'antivirus',
            'color',
            'status'
  		];
  
  public $timestamps = false;
}
