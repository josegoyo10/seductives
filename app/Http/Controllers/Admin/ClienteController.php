<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Escort;
use App\Perfil;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Response;

class ClienteController extends Controller
{
    //

        public function index()
        {
           
          $user = Auth::user(); 
          // dd($user);
            
            if (auth()->user()->hasRole('Admin')) {

               //  $clientes = Escort::orderBy('id', 'ASC')->get();
                $clientes =   $query = DB::table("escorts")
                ->select("escorts.id","escorts.rut","escorts.nombres",
                    "escorts.apellidos",
                    "escorts.email",
                    "escorts.nacionalidad",
                    "escorts.id_estado",
                    "escorts.fecha_nacimiento",
                    "escorts.comentario_escort",
                    "escorts.comentario_aprob_rechazo",
              
                DB::raw('CASE 

                WHEN escorts.id_estado = 1 THEN "PENDIENTE"
        
                WHEN escorts.id_estado = 2 THEN "RECHAZADO" 
        
                ELSE "APROBADO" 
        
                END AS descripcion_estado') 
                )
                ->orderby('escorts.id')
                ->get();

                    //en caso de que tenga rol de escort y tipo usuario sea una escort
          } elseif (auth()->user()->hasRole('Escort') AND ($user->id_tipo_usuario == 1))  {

             $email_usuario_sesion = auth()->user()->email;

            $clientes =   $query = DB::table("escorts")
            ->select("escorts.id","escorts.rut",
            "escorts.nombres",
            "escorts.apellidos",
            "escorts.email",
            "escorts.nacionalidad",
            "escorts.id_estado",
            "escorts.fecha_nacimiento",
            "escorts.comentario_escort",
            "escorts.comentario_aprob_rechazo",

            DB::raw('CASE 

            WHEN escorts.id_estado = 1 THEN "PENDIENTE"
    
            WHEN escorts.id_estado = 2 THEN "RECHAZADO" 
    
            ELSE "APROBADO" 
    
            END AS descripcion_estado') 
            )
             ->where('escorts.email','=',$email_usuario_sesion )
            ->orderby('escorts.id')
            ->get();

          } elseif (auth()->user()->hasRole('Usuario Basico') AND ($user->id_tipo_usuario == 2)) {

                    $clientes =  DB::table("escorts")
                    ->select("escorts.id","escorts.nombres","escorts.apellidos","escorts.email",
                     "escorts.nacionalidad",
                     "perfiles.edad",
                     "perfiles.comuna",
                     "perfiles.telefono",
                     "perfiles.altura",
                     "perfiles.medidas",
                     "perfiles.foto_principal")
                    ->join("perfiles","perfiles.id_escort","=","escorts.id")
                    ->where("escorts.id_estado",'=','3')
                    ->orderby('escorts.id')
                    ->get();

               }
          

             return view('admin.clientes.index', compact('clientes'));
       
        
        }

        public function getInfoCliente($id) {
         
         

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
             "perfiles.foto_principal",
             "perfiles.foto_secundaria_1",
             "perfiles.foto_secundaria_2",
             "perfiles.altura",
             "perfiles.medidas",
             "escorts.comentario_escort",
             "escorts.comentario_aprob_rechazo"
            )
            ->join("perfiles","perfiles.id_escort","=","escorts.id")
            ->WHERE("escorts.id",'=',$id)
            ->orderby('escorts.id')
        ->first();

          $sql_foto_escort = DB::table("escort_fotos")
              ->SELECT("escorts.id","escort_fotos.url_fotos")
              ->JOIN("escorts","escorts.id",'=',"escort_fotos.id_escort")
              ->WHERE("escorts.id",'=',$id)->get();
            
           // dd($sql_foto_escort);

           return view('admin.clientes.show', compact('query','sql_foto_escort'));


        }


        //actualizar estado escort
        public function updateEstadoescort(Request $request) {

          //  dd($request);
          
          $escort_id                     = Input::get('escort_id');
          $id_opcion                     = Input::get('id_option');
          $comentario_aprobacion_rechazo = Input::get('comentario_aprob_rechazo');

          
           $escorts                           =  Escort::find($escort_id);
           $escorts->id_estado                =  $id_opcion;
           $escorts->comentario_aprob_rechazo =  $comentario_aprobacion_rechazo;
           $escorts->save();

          //Si el escorts existe en la tabla users.



           if ($escorts) {
               return "1";
           } else {
             return "0";
           }

        }


         //actualizar Perfil Escort

         public function updateEscortInfo(Request $request) {

            $escort_id             = Input::get('escort_id');
            $escorts               =  Escort::find($escort_id);
            $escorts->nombres      =  Input::get('nombre_escort');
            $escorts->apellidos    =  Input::get('apellido_escort');
            $escorts->save();

            
             $perfil                 = Perfil::where('id_escort', '=', $escort_id )->firstOrFail();
             $perfil->edad           = Input::get('edad_escort');
             $perfil->region         = Input::get('region_escort');
             $perfil->comuna         = Input::get('comuna_escort');
             $perfil->telefono       = Input::get('telefono_escort');
             $perfil->descripcion    = Input::get('comentario_escort');
             $perfil->id_estado       = "3" ;
             $perfil->save();


                 if ($perfil) {
                      return Response::json(['success' => '1']);
                  } else {
                     return "0";
                    }

         

       }

}