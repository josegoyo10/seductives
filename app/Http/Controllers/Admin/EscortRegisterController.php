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
use App\Rating;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\ServiciosEscort;
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

          //obtener SI el usuario evaluo la escort.
          $sql_rating_escort = DB::table("ratings")
            ->WHERE("escort_id",'=',$id)
            ->Where("user_id",'=',$user->id)
            ->first();

          //obtener el numero de usuarios que han evaluado la escort.
          $sql_rating_total =  DB::table('ratings')->where("escort_id",'=',$id)->sum('rating_total');
         
          $count_escort = Rating::where('escort_id','=', $id)->count();

          
         $tipo_servicios = DB::table("servicios_escort")
         ->SELECT("servicios_escort.id_tipo_servicio","tipo_servicios.nombre_servicio")
         ->JOIN("tipo_servicios","tipo_servicios.id",'=',"servicios_escort.id_tipo_servicio")
         ->WHERE("servicios_escort.id_escort",'=',$id)
         ->get();

          $count_tipoServicios = ServiciosEscort::where("servicios_escort.id_escort",'=',$id)->count();
          $suma_tipoServicios  = $count_tipoServicios + 6;
          //dd($count_tipoServicios);

          // $rating_calificado = DB::table("servicios_evaluados_escort")
          // ->SELECT("servicios_evaluados_escort.id_rating","servicios_evaluados_escort.nombre_servicio",
          //  "servicios_evaluados_escort.valor_servicio_evaluado")
          // ->JOIN("ratings","ratings.id",'=',"servicios_evaluados_escort.id_rating")
          // ->WHERE("ratings.escort_id",'=',$id)
          // ->get();


          $rating_calificado = DB::table("servicios_evaluados_escort")
          ->select("servicios_evaluados_escort.nombre_servicio"
              ,DB::raw('SUM(servicios_evaluados_escort.valor_servicio_evaluado) as total'))
          ->join("ratings","ratings.id","=","servicios_evaluados_escort.id_rating")
          ->WHERE("ratings.escort_id",'=',$id)
          ->groupBy("servicios_evaluados_escort.nombre_servicio")
          ->get();

      
    // dd($rating_calificado);

        return view('admin.escort_register.index', compact('query','sql_foto_escort','regiones','comunas',
        'sql_desc_comuna','data','usuario','count','sql_follow_escort','comentarios','sql_rating_escort','count_escort',
        'sql_rating_total','tipo_servicios','suma_tipoServicios','rating_calificado'));
    }


     //calificar escort
    public function qualifyEscort () {

          $user = Auth::user(); 
   
          $data = DB::table("users")
          ->WHERE("users.email",'=', $user->email)->first();

        return view('admin.escort_register.calificar',compact('data'));
    }




}
