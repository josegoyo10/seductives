<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\FollowEscort;
use Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    //
     public function addfollow(Request $request) {

        $id_follower    =  Input::get('uid');
        $accion         =  Input::get('action');
        $user           = Auth::user(); 


        //status notificacion
        // 0: significa que no esta siguiendo.
        // 1: significa que envio petición de seguir a escort.
        // 2: significa que la escort acepto invitación, en caso de que escort rechaze status vuelve a 0.
       
        if ($accion == "follow") {

             $existe_follow = FollowEscort::where(['sender_id' => $user->id,'receiver_id' => $id_follower])->count();
            
             if ((!$existe_follow)) {
                FollowEscort::create([
                    'sender_id'         => Auth::id(),
                    'receiver_id'       =>  $id_follower,
                    'status_invitacion' => "1"
                ]);
        
            } else {
               
                 $update_follow =  FollowEscort::findOrFail($id_follower);
                 $update_follow->status_invitacion = 1;
                 $update_follow->save();
                       
                  
               }
            
            return "1";
        
        } elseif ($action == "unfollow") {
             
                 $update_follow =  FollowEscort::findOrFail($id_follower);
                 $update_follow->status_invitacion = 0;
                 $update_follow->save();

            return "2";
        } else {

            return "3";
        }
         

     }

     //solicitud amistad
     public function friendship() {
          $user = Auth::user(); 

        //dd($user->email);

            $data = DB::table("users")
            ->WHERE("users.email",'=',  $user->email)->first();

             $email_usuario_sesion = auth()->user()->email;

            $clientes =  DB::table("escorts")
            ->select("escorts.id as Id_escort","escorts.rut",
            "escorts.nombres",
            "escorts.apellidos",
            "escorts.email",
            "escorts.nacionalidad",
            "escorts.id_estado",
            "escorts.fecha_nacimiento",
            "escorts.comentario_escort",
            "escorts.comentario_aprob_rechazo",
            "perfiles.foto_principal",
            "regiones.nombre as descripcion_region",
            "comuna.nombre as descripcion_comuna",
            

            DB::raw('CASE 

            WHEN escorts.id_estado = 1 THEN "PENDIENTE"

            WHEN escorts.id_estado = 2 THEN "RECHAZADO" 

            ELSE "APROBADO" 

            END AS descripcion_estado') 
            )
            ->where('escorts.email','=',$email_usuario_sesion )
            ->join("perfiles","perfiles.id_escort","=","escorts.id")
            ->join("regiones","regiones.id","=","perfiles.region")
            ->join("comuna", "comuna.id", "=", "perfiles.comuna")
            ->orderby('escorts.id')
            ->first();

       

            //QUERY para saber las solicitudes de amistad de la escort.
            $list_friendship = DB::table("follow_escort")
              ->select("users.id",
              "follow_escort.sender_id",
              "follow_escort.receiver_id",
              "users.name",
              "users.last_name",
              "follow_escort.status_invitacion")
              ->join("users","users.id","=","follow_escort.sender_id")
              ->where('follow_escort.receiver_id','=', $clientes->Id_escort)
              ->get();

              //dd($list_friendship);

             return view('admin.clientes.request_friendship',compact('data','clientes','list_friendship'));
        }


       //confirm friendship
       public function confirmfriendship( Request $request) {

            $user           = Auth::user(); 
            $id_usuario     =  Input::get('id_usuario');
            $id_escort      =  Input::get('id_escort');
               
            
            $sql_confirm =  FollowEscort::where('sender_id', '=', $id_usuario)->firstOrFail();

            $sql_confirm->status_invitacion = 2;
            $sql_confirm->save();

            return redirect()->back()->with('success', 'Operación Exitosa');



       }








}
