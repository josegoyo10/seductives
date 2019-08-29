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
use App\Visited_Profile;
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



         //insertar en la perfiles visitados.
         $cont = Visited_Profile::where(['escort_id' => $id])->first();
        //dd($cont);

         if (($cont == null)) {
            Visited_Profile::create([
                'user_id' => Auth::id(),
                'escort_id' => $id,
                'seen' => 1

            ]);
        } else {
            $update_profile =  Visited_Profile::findOrFail($id);
            $update_profile->seen =$cont->seen + 1;
            $update_profile->save();

        }   

          $regiones = Region::all();
          $comunas   = Comuna::all();

           $query = DB::table("escorts")
           ->select("escorts.id","escorts.nombres","escorts.apellidos","escorts.email",
            "escorts.nacionalidad","escorts.id_estado",
            "escorts.apodo_escort",
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
            "comuna.nombre as descripcion_comuna",
            "follow_escort.status_invitacion")
           ->join("perfiles","perfiles.id_escort","=","escorts.id")
           ->join("regiones","regiones.id","=","perfiles.region")
           ->join("comuna", "comuna.id", "=", "perfiles.comuna")
           ->leftjoin("follow_escort", "follow_escort.receiver_id", "=", "escorts.id")
           ->WHERE("escorts.id",'=',$id)
           ->orderby('escorts.id')
           ->first();
          
         //dd($query);

         $sql_follow_escort = DB::table("follow_escort")
            ->SELECT("follow_escort.status_invitacion")
            ->WHERE("follow_escort.sender_id",'=',$user->id)
            ->Where("follow_escort.receiver_id",'=',$id)
            ->first(); 
        
      //dd($sql_follow_escort);

         $sql_foto_escort = DB::table("escort_fotos")
             ->SELECT("escorts.id","escort_fotos.url_fotos")
             ->JOIN("escorts","escorts.id",'=',"escort_fotos.id_escort")
             ->WHERE("escorts.id",'=',$id)
             ->get();

          $sql_desc_comuna = DB::table("comuna")
          ->SELECT("comuna.id","comuna.nombre")
          ->WHERE("comuna.id",'=', $query->comuna)->first();

          //$count = Comment::where(['user_id' => $user->id, 'escort_id' =>$id ])->count();
         
          $count = Comment::count();
          $comentarios =  Comment::all();

      //dd($count);
      
        return view('admin.escort_register.index', compact('query','sql_foto_escort','regiones','comunas','sql_desc_comuna','data','usuario','count','sql_follow_escort','comentarios'));
    }


     //calificar escort
    public function qualifyEscort () {

          $user = Auth::user(); 
   
          $data = DB::table("users")
          ->WHERE("users.email",'=', $user->email)->first();

        return view('admin.escort_register.calificar',compact('data'));
    }




}
