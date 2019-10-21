<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'ratings';
    protected $fillable = [
        'user_id','escort_id','rating_total','comentarios_users',
        'llamada','lugar_atencion','presentacion_personal','rostro' ,
        'busto', 'trasero', 'besos', 'quejidos', 'mov_pelvicos','sexo_oral',
        'sexo_vaginal',  'sexo_anal','fecha_calificacion'
    ];
}
