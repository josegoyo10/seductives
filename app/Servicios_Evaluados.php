<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicios_Evaluados extends Model
{
    protected $table = 'servicios_evaluados_escort';
    protected $fillable = ['id_rating','nombre_servicio','valor_servicio_evaluado' ];
}
