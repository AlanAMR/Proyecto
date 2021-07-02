<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermisosRoles extends Model
{
    protected $table = 'permisosroles';
  protected $guarded = ['id'];
  protected $fillable = ['permiso_id','rol_id'];
  public $timestamps = false;
}
