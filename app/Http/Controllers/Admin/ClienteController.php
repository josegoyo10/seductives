<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Escort;
use App\Perfil;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ClienteController extends Controller
{
    //

        public function index()
        {
           
            
            if (auth()->user()->hasRole('Admin')) {

               //  $clientes = Escort::orderBy('id', 'ASC')->get();
                $clientes =   $query = DB::table("escorts")
                ->select("escorts.id","escorts.rut","escorts.nombres","escorts.apellidos","escorts.email",
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

                   
          } elseif (auth()->user()->hasRole('Escort')) {

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

          } elseif (auth()->user()->hasRole('Usuario Basico')) {

                    $clientes =    DB::table("escorts")
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

           return view('admin.clientes.show', compact('query'));


        }


        //actualizar estado escort
        public function updateEstadoescort(Request $request) {

          //  dd($request);
          
          $escort_id                     = Input::get('escort_id');
          $id_opcion                     = Input::get('id_option');
          $comentario_aprobacion_rechazo = Input::get('comentario_aprob_rechazo');

          
           $escorts                           =  Escort::find($escort_id);
           $escorts->id_estado                = $id_opcion;
           $escorts->comentario_aprob_rechazo =  $comentario_aprobacion_rechazo;
           $escorts->save();

           if ($escorts) {
               return "1";
           } else {
             return "0";
           }

        }










}
