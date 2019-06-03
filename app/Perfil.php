<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model

{
    protected $table = 'perfiles';

    protected $fillable = ['id_escort', 'id_categoria','seo_slug','region','comuna',
    'descripcion', 'foto_principal','foto_secundaria_1','foto_secundaria_1','altura','medidas',
   'servicios','horario','atencion','telefono','precio','fecha_registro','id_estado'];
}
