<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responsivas extends Model
{
  protected $table = 'responsivas';
  protected $fillable = [
  							'id', 
  							'usuario_solicita',
  							'usuario_autoriza',
  							'usuario_entrega',
  							'status',
                'pdf_generado',
                'archivos_subidos'
  						];
  protected $guarded = ['id'];
  public $timestamps = true;
}
