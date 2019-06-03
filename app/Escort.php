<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escort extends Model
{
    protected $fillable = ['rut', 'nombres','apellidos','email','fecha_nacimiento','nacionalidad', 'id_estado'];
}
