<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermisosEspeciales extends Model
{
    //
    protected $table = 'permisosespeciales';
  protected $guarded = ['id'];
  protected $fillable = ['usuario_id','permiso_id'];
  public $timestamps = false;
}
