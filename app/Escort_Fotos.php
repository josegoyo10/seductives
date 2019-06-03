<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escort_Fotos extends Model
{
    protected $table = 'escort_fotos';

    protected $fillable = ['id_escort', 'id_perfil','url_fotos'];
}

