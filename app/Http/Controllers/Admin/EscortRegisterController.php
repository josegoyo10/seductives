<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Escort;
use App\Perfil;
use App\Region;
use App\Comuna;
use App\User; 
use App\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Response;

class EscortRegisterController extends Controller
{
    
    public function getPerfilRegister($id) {
        
         

        $user = Auth::user(); 
        // dd($user->id_tipo_usuario);
          $data = DB::table("users")
          ->WHERE("users.email",'=', $user->email)->first();
      
          $usuario =  User::find($id);


          $regiones = Region::all();
          $comunas   = Comuna::all();

           $query = DB::table("escorts")
           ->select("escorts.id","escorts.nombres","escorts.apellidos","escorts.email",
            "escorts.nacionalidad","escorts.id_estado",
            "perfiles.id_perfil",
            "perfiles.edad",
            "perfiles.comuna",
            "perfiles.region",
            "perfiles.edad",
            "perfiles.telefono",
            "perfiles.foto_principal",
            "perfiles.foto_secundaria_1",
            "perfiles.foto_secundaria_2",
            "perfiles.descripcion as descripcion_servicio",
            "perfiles.altura",
            "perfiles.medidas",
            "escorts.comentario_escort",
            "escorts.comentario_aprob_rechazo",
            "regiones.nombre as descripcion_region",
            "comuna.nombre as descripcion_comuna")
           ->join("perfiles","perfiles.id_escort","=","escorts.id")
           ->join("regiones","regiones.id","=","perfiles.region")
          ->join("comuna", "comuna.id", "=", "perfiles.comuna")
           ->WHERE("escorts.id",'=',$id)
           ->orderby('escorts.id')
           ->first();
          
          // dd($query);

         $sql_foto_escort = DB::table("escort_fotos")
             ->SELECT("escorts.id","escort_fotos.url_fotos")
             ->JOIN("escorts","escorts.id",'=',"escort_fotos.id_escort")
             ->WHERE("escorts.id",'=',$id)->get();

          $sql_desc_comuna = DB::table("comuna")
          ->SELECT("comuna.id","comuna.nombre")
          ->WHERE("comuna.id",'=', $query->comuna)->first();

          $count = Comment::where(['user_id' => $user->id, 'escort_id' =>$id ])->count();
         // dd($count);
      
        return view('admin.escort_register.index', compact('query','sql_foto_escort','regiones','comunas','sql_desc_comuna','data','usuario','count'));
    }







}
