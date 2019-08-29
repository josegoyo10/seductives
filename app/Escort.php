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

   /* toma un precio y lo deja fromaiado con puntitos*/
     public static function formato_precio($val) {
        $s = "";
        $valor = abs($val);
        $largo = strlen($valor);
        $mod = ($largo % 3 );
        for ($i=0; $i<$largo; $i++) {
          if (((($i - $mod) % 3) == 0) && ($i != 0)) {
              $s = $s . ".";
          }
          $s = $s . substr($valor, $i, 1);
        }
        return $s;  
      }

}
