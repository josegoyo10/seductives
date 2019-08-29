<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiciosEscort extends Model
{
    protected $table = 'servicios_escort';
    protected $fillable = ['id_escort','id_tipo_servicio' ];
}
