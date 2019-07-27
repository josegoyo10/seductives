<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    protected $table = 'tipo_usuarios';
    protected $fillable = [
        'id_tipo_usuario','descripcion'
    ];
}
