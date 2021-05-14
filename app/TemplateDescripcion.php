<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemplateDescripcion extends Model
{
   protected $table = 'template_descripcion';
  protected $fillable = [
  							'id', 
  							'template_id',
  							'imagen',
  							'descripcion'
  						];
  protected $guarded = ['id'];
  public $timestamps = false;
}
