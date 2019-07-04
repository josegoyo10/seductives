<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escort extends Model
{
    protected $fillable = ['rut', 'nombres','apellidos','email','fecha_nacimiento','nacionalidad', 'id_estado'];



    //1 escort tiene muchas fotos
    public function escorts_fotos()
    {
        return $this->hasMany(Escort_Fotos::Class);
    }

    public function likes()
    {
      return $this->hasMany(Like::class);
    }

}
