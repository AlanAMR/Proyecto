<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Computadoras extends Model
{
  protected $table = 'computadoras';
  
  protected $guarded = ['id'];

  protected $fillable = [
            'num_serie',
            'marca',
            'modelo',
            'procesador',
            'sistema_operativo',
            'antivirus',
            'status'
  		];
  
  public $timestamps = false;
}
