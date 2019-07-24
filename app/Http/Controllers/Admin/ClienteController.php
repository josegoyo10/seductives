<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Escort;
use App\Perfil;
use App\Region;
use App\Comuna;
use App\Like;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Response;
use Illuminate\Support\Facades\Storage;


class ClienteController extends Controller
{
    //

        public function index()
        {
           
          $user = Auth::user(); 
        // dd($user->id_tipo_usuario);
          $data = DB::table("users")
          ->WHERE("users.email",'=', $user->email)->first();
          
         

            if (auth()->user()->hasRole('Admin')) {

               //  $clientes = Escort::orderBy('id', 'ASC')->get();
                $clientes =   DB::table("escorts")
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

            $clientes =  DB::table("escorts")
            ->select("escorts.id","escorts.rut",
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
            ->get();

          } elseif (auth()->user()->hasRole('USUARIO REGISTRADO') AND ($user->id_tipo_usuario == 2)) {
                
            
                    $clientes =  DB::table("escorts")
                    ->select("escorts.id",
                      "escorts.nombres",
                      "escorts.apellidos",
                      "escorts.email",
                      "escorts.rut",
                      "escorts.fecha_nacimiento",
                      "escorts.nacionalidad",
                      "perfiles.edad",
                      "perfiles.comuna",
                      "perfiles.telefono",
                      "perfiles.altura",
                      "perfiles.medidas",
                      "perfiles.foto_principal",
                      "estados.descripcion_estado",
                      "regiones.nombre as descripcion_region",
                      "comuna.nombre as descripcion_comuna")
                    ->join("perfiles","perfiles.id_escort","=","escorts.id")
                    ->join("estados","estados.id","=","escorts.id_estado")
                    ->join("regiones","regiones.id","=","perfiles.region")
                    ->join("comuna", "comuna.id", "=", "perfiles.comuna")
                    ->where("escorts.id_estado",'=','3')
                    ->orderby('escorts.id')
                    ->get();

                    // dd($clientes);

                  
               }

             return view('admin.clientes.index', compact('clientes','data','likes'));
       
        }

        public function getInfoCliente($id) {
         
          $user = Auth::user(); 
          // dd($user);
          $data = DB::table("users")
          ->WHERE("users.email",'=',  $user->email)->first();

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
             "perfiles.altura",
             "perfiles.medidas",
             "escorts.comentario_escort",
             "escorts.comentario_aprob_rechazo",
             "regiones.nombre as descripcion_region",
             "comuna.nombre as descripcion_comuna" )
            ->join("perfiles","perfiles.id_escort","=","escorts.id")
            ->join("regiones","regiones.id","=","perfiles.region")
            ->join("comuna", "comuna.id", "=", "perfiles.comuna")
            ->WHERE("escorts.id",'=',$id)
            ->orderby('escorts.id')
            ->first();

          $sql_foto_escort = DB::table("escort_fotos")
              ->SELECT("escorts.id","escort_fotos.url_fotos")
              ->JOIN("escorts","escorts.id",'=',"escort_fotos.id_escort")
              ->WHERE("escorts.id",'=',$id)->get();

          $sql_desc_comuna = DB::table("comuna")
          ->SELECT("comuna.id","comuna.nombre")
          ->WHERE("comuna.id",'=', $query->comuna)->first();

           return view('admin.clientes.show', compact('query','sql_foto_escort','regiones','comunas','sql_desc_comuna','data'));

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

            
             $perfil                    = Perfil::where('id_escort', '=', $escort_id )->firstOrFail();
             $perfil->region            = Input::get('region_escort');
             $perfil->comuna            = Input::get('comuna_escort');
             $perfil->telefono          = Input::get('telefono_escort');
             $perfil->descripcion       = Input::get('descripcion_servicio_escort');
             $perfil->comentario_escort = Input::get('comentario_escort');
             $perfil->altura            = Input::get('altura_escort');
             $perfil->medidas           = Input::get('medida_escort');
             $perfil->hora_inicio       = Input::get('horario_ini_escort');
             $perfil->hora_fin          = Input::get('horario_fin_escort');
             $perfil->atencion          = Input::get('atencion_escort');
             $perfil->dias_disponibles  = Input::get('dias_disponible');
             $perfil->precio            = Input::get('precio_escort'); 
             $perfil->id_estado         = "3" ;
             $perfil->save();


                 if ($perfil) {
                      return Response::json(['success' => '1']);
                  } else {
                     return "0";
                    }

       }


      //Eliminar Foto
      public function destroy($url_foto)
      {
        $idEscort = Input::get('id_escort');
        
        //dd($url_foto);

         DB::table('escort_fotos')
           ->where('id_escort','=', $idEscort)
           ->Where('url_fotos','=',$url_foto)
           ->delete();
  
        //   $photoPath = str_replace('storage','public',$url_foto);
        
        // Storage::delete($photoPath);
  
        return back()->with('flash', 'Foto eliminada');
      }
      

       //Eliminar Foto Storage
       public function eliminar($url_foto)
       {
         $idEscort = Input::get('escort_id');
         
        // dd($idEscort);
         
   
         //   $photoPath = str_replace('storage','public',$url_foto);
         
         // Storage::delete($photoPath);
   
         return back()->with('flash', 'Foto eliminada');
       }

     //actualizar foto de Perfil
     public function update_avatar(Request $request){

       $id_escort = Input::get('escortID');
      
      // dd($id_escort);

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($request->hasfile('avatar'))
        {
    
          $file          = request()->file('avatar')->store('public');
          $url_principal =  Storage::url($file);
                    
        }
        
        $perfil  = Perfil::where('id_escort', '=', $id_escort )->firstOrFail();
        $perfil->foto_principal =  $url_principal;
        $perfil->save();
       
        return back()
            ->with('success','La imagen fue subida exitosamente.');

  }



}
