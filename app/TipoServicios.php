<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoServicios extends Model
{
    protected $table = 'tipo_servicios';
    protected $fillable = ['nombre'];
}
