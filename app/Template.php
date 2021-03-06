<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
   protected $table = 'template';
  protected $fillable = [
  							'id', 
  							'nombre',
  							'archivo'
  						];
  protected $guarded = ['id'];
  public $timestamps = false;
}
