<?php

namespace App\Http\Controllers;
use App\Escort;
use App\Perfil;
use App\Escort_Fotos;
use App\Region;
use App\Comuna;
use App\Comment;
use App\User;
use App\Like;
use App\Categorias;
use App\TipoServicios;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index($categorias=null)
    {
        //return viesw('home');
        $user = Auth::user();
      //dd($user);
      $ldate = date('d-m-Y H:i:s');

      $details = json_decode(file_get_contents("http://ipinfo.io/json"));

	  	$regiones =  Region::where('nombre','LIKE',"%{$details->city}%")->get();

		  $opciones =  Input::get('opciones');
	  	$nombre_region = trim(str_replace("Región Metropolitana de", " ", $regiones[0]->nombre));

      $likes_user = Like::select(['likes_count.*'])
                       ->groupBy('id')
                       ->count();

      // $dislike_user = Like::select(['dislike_count.*'])
      //                  ->groupBy('id')
      //                  ->count();
      
     $seen = Like::select(['seen.*'])
                       ->groupBy('id')
                       ->count();
           
    $buscar = Input::get('search_escort');
    
  //dd($user->id_tipo_usuario );

     if ($user->id_tipo_usuario == 1) {

         $vista = "Escort";
       
         $sql_escort = DB::table("escorts")
        ->select("escorts.id","escorts.nombres","escorts.apellidos","escorts.email")
        ->WHERE("escorts.email", "=", $user->email)
        ->first();
        

       //dd($sql_escort);

        $data = DB::table("escorts")
         ->select("escorts.id","escorts.nombres","escorts.apellidos",
          "escorts.nacionalidad",
          "escorts.comentario_escort",
          "escorts.apodo_escort",
         "perfiles.id_perfil",
         "perfiles.edad",
         "perfiles.categoria_escort",
         "perfiles.color_piel",
         "perfiles.color_cabello",
         "perfiles.caracteristica_fisicas",
         "perfiles.comuna",
         "perfiles.region",
         "perfiles.telefono",
         "perfiles.altura",
         "perfiles.medidas",
         "perfiles.atencion",
         "perfiles.precio",
         "perfiles.hora_inicio",
         "perfiles.hora_fin",
         "perfiles.dias_disponibles",
         "perfiles.descripcion as descripcion_servicio",
         "perfiles.foto_principal",
         "perfiles.foto_secundaria_1",
         "perfiles.foto_secundaria_2",
         "regiones.nombre as descripcion_region",
         "comuna.nombre as descripcion_comuna" )
        ->join("perfiles","perfiles.id_escort","=","escorts.id")
        ->join("regiones","regiones.id","=","perfiles.region")
        ->join("comuna", "comuna.id", "=", "perfiles.comuna")
        ->LEFTJOIN("categorias", "categorias.id", "=", "perfiles.categoria_escort")
        ->WHERE("escorts.id", "=", $sql_escort->id)
        ->first();
        
         //dd($data);

       $usuario =  User::find($sql_escort->id);

       //obtener las fotos de la escort
       $sql_foto_escort = DB::table("escort_fotos")
       ->select("escort_fotos.id","escort_fotos.url_fotos")
       ->WHERE("escort_fotos.id_escort", "=", $sql_escort->id)
       ->get();

       $regiones    = Region::all();
       $comunas     = Comuna::all();

       $categorias   = Categorias::all();
       $tipo_servicios = TipoServicios::all();

       
      $data_tipoServicios = DB::table("servicios_escort")
      ->select("servicios_escort.id_escort","servicios_escort.id_tipo_servicio","tipo_servicios.nombre_servicio")
      ->join("tipo_servicios","tipo_servicios.id","=","servicios_escort.id_tipo_servicio")
      ->WHERE("servicios_escort.id_escort", "=", $sql_escort->id)
      ->get();

       //dd($data_tipoServicios);
       $count = Comment::where(['escort_id' => $sql_escort->id ])->count();

       $comentarios =  Comment::all();

       $sql_desc_comuna = DB::table("comuna")
       ->SELECT("comuna.id","comuna.nombre")
       ->WHERE("comuna.id",'=', $data->comuna)->first();

     } else if($user->id_tipo_usuario == 2) {

        $vista = "Usuario Basico";
       //dd(auth()->user()->hasRole('USUARIO REGISTRADO'));
       //dd($vista);

        $data = DB::table("users")
        ->WHERE("users.email",'=',  $user->email)->first();

         
        if  ($opciones != '') {

          $listEscort = DB::table("escorts")
            ->select("escorts.id","escorts.nombres","escorts.apellidos","escorts.email",
            "escorts.nacionalidad",
            "escorts.apodo_escort",
            "perfiles.edad",
            "perfiles.comuna",
            "perfiles.telefono",
            "perfiles.altura",
            "perfiles.medidas",
            "perfiles.foto_principal",
            "regiones.nombre as descripcion_region",
            "comuna.nombre as descripcion_comuna" )
            ->join("perfiles","perfiles.id_escort","=","escorts.id")
            ->join("regiones","regiones.id","=","perfiles.region")
            ->join("comuna", "comuna.id", "=", "perfiles.comuna")
            ->whereIn('caracteristica_fisicas', $opciones)
            ->get();
           
        }else {
          
          
          if ($buscar != '') {

             
              $listEscort = DB::table("escorts")
              ->select("escorts.id","escorts.nombres","escorts.apellidos","escorts.email",
              "escorts.nacionalidad",
              "escorts.apodo_escort",
              "perfiles.edad",
              "perfiles.comuna",
              "perfiles.telefono",
              "perfiles.altura",
              "perfiles.medidas",
              "perfiles.foto_principal",
              "regiones.nombre as descripcion_region",
              "comuna.nombre as descripcion_comuna" )
              ->join("perfiles","perfiles.id_escort","=","escorts.id")
              ->join("regiones","regiones.id","=","perfiles.region")
              ->join("comuna", "comuna.id", "=", "perfiles.comuna")
              ->where("escorts.id_estado",'=','3')
              ->where('escorts.apodo_escort', 'like', '%'. $buscar . '%')
              ->orderby('escorts.id')
            ->get();
    
    
            } else if (($buscar == '') && ($categorias == '')) {
    
             
              $listEscort = DB::table("escorts")
                    ->select("escorts.id","escorts.nombres","escorts.apellidos","escorts.email",
                    "escorts.nacionalidad",
                    "escorts.apodo_escort",
                    "perfiles.edad",
                    "perfiles.comuna",
                    "perfiles.telefono",
                    "perfiles.altura",
                    "perfiles.medidas",
                    "perfiles.foto_principal",
                    "regiones.nombre as descripcion_region",
                    "comuna.nombre as descripcion_comuna" )
                    ->join("perfiles","perfiles.id_escort","=","escorts.id")
                    ->join("regiones","regiones.id","=","perfiles.region")
                    ->join("comuna", "comuna.id", "=", "perfiles.comuna")
                    ->Where("perfiles.region","=",$regiones[0]->id)
                    ->where("escorts.id_estado",'=','3')
                    ->orderby('escorts.id')
                  ->get();

                  //dd($data);


            } else {
              if ( $categorias != '') {
    
                $id_categoria = DB::table("categorias")
                ->select("categorias.id")
                ->where("categorias.nombre",'=',$categorias)->first();
              
                  if ($id_categoria <> null) {
              
    
                    $listEscort = DB::table("escorts")
                      ->select("escorts.id","escorts.nombres","escorts.apellidos","escorts.email",
                      "escorts.nacionalidad",
                      "escorts.apodo_escort",
                      "perfiles.edad",
                      "perfiles.comuna",
                      "perfiles.telefono",
                      "perfiles.altura",
                      "perfiles.medidas",
                      "perfiles.foto_principal",
                      "regiones.nombre as descripcion_region",
                      "comuna.nombre as descripcion_comuna" )
                      ->join("perfiles","perfiles.id_escort","=","escorts.id")
                      ->join("regiones","regiones.id","=","perfiles.region")
                      ->join("comuna", "comuna.id", "=", "perfiles.comuna")
                      ->Where("perfiles.categoria_escort", '=', $id_categoria->id)
                      ->orderby('escorts.id')
                      ->get();
    
              //dd($data);
    
              } else {
                if ( $categorias != '') {
                  //dd($categorias);
                  $listEscort = DB::table("escorts")
                  ->select("escorts.id","escorts.nombres","escorts.apellidos","escorts.email",
                  "escorts.nacionalidad",
                  "escorts.apodo_escort",
                  "perfiles.edad",
                  "perfiles.comuna",
                  "perfiles.telefono",
                  "perfiles.altura",
                  "perfiles.medidas",
                  "perfiles.foto_principal",
                  "regiones.nombre as descripcion_region",
                  "comuna.nombre as descripcion_comuna" )
                  ->join("perfiles","perfiles.id_escort","=","escorts.id")
                  ->join("regiones","regiones.id","=","perfiles.region")
                  ->join("comuna", "comuna.id", "=", "perfiles.comuna")
                  ->join("servicios_escort", "servicios_escort.id_escort", "=", "escorts.id")
                  ->join("tipo_servicios", "tipo_servicios.id", "=", "servicios_escort.id_tipo_servicio")
                  ->Where("tipo_servicios.id", '=', $categorias)
                  ->orderby('escorts.id')
                  ->get();
    
                //dd($data);
    
                  }
    
                }
              }
            }
      
        }

       

        $clientes =  DB::table("escorts")
        ->select("escorts.id",
          "escorts.nombres",
          "escorts.apellidos",
          "escorts.apodo_escort",
          "escorts.email",
          "escorts.nacionalidad",
          "perfiles.id_perfil",
          "perfiles.edad",
          "perfiles.comuna",
          "perfiles.region",
          "perfiles.telefono",
          "perfiles.altura",
          "perfiles.medidas",
          "perfiles.atencion",
          "perfiles.precio",
          "perfiles.hora_inicio",
          "perfiles.hora_fin",
          "perfiles.dias_disponibles",
          "perfiles.descripcion as descripcion_servicio",
          "perfiles.foto_principal",
          "perfiles.foto_secundaria_1",
          "perfiles.foto_secundaria_2",
          "regiones.nombre as descripcion_region",
          "comuna.nombre as descripcion_comuna" )
        ->join("perfiles","perfiles.id_escort","=","escorts.id")
        ->join("regiones","regiones.id","=","perfiles.region")
        ->join("comuna", "comuna.id", "=", "perfiles.comuna")
        ->where("escorts.id_estado",'=','3')
        ->orderby('escorts.id')
        ->get();

      //dd($clientes);

           //obtener las fotos de la escort
         $sql_foto_escort = DB::table("escort_fotos")
         ->select("escort_fotos.id","escort_fotos.url_fotos")
         ->get();

        // dd($sql_foto_escort);

         $regiones = Region::all();
         $comunas   = Comuna::all();
         $categorias   = Categorias::all();
         $tipo_servicios = TipoServicios::all();

         $data_tipoServicios = DB::table("servicios_escort")
         ->select("servicios_escort.id_escort","servicios_escort.id_tipo_servicio","tipo_servicios.nombre_servicio")
         ->join("tipo_servicios","tipo_servicios.id","=","servicios_escort.id_tipo_servicio")
         ->get();

       $sql_desc_comuna = DB::table("comuna")
       ->SELECT("comuna.id","comuna.nombre");

       $count = Comment::where(['user_id' => $data->id ])->count();
      // dd($count);

      }elseif ($user->id_tipo_usuario == 3) {

           
        $vista = "ADMIN";
        $count = 0;
        $user = Auth::user(); 
        // dd($user);
        $data = DB::table("users")
        ->WHERE("users.email",'=',  $user->email)->first();
            
       // dd(auth()->user()->hasRole('Admin'));
            if (auth()->user()->hasRole('Admin')) {
         

               //  $clientes = Escort::orderBy('id', 'ASC')->get();
                $clientes =   $query = DB::table("escorts")
                ->select("escorts.id","escorts.rut","escorts.nombres",
                    "escorts.apellidos",
                    "escorts.email",
                    "escorts.apodo_escort",
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

               
                   //obtener las fotos de la escort
                        $sql_foto_escort = DB::table("escort_fotos")
                        ->select("escort_fotos.id","escort_fotos.url_fotos")
                        ->get();

                        // dd($sql_foto_escort);

                        $regiones = Region::all();
                        $comunas   = Comuna::all();

                    $sql_desc_comuna = DB::table("comuna")
                    ->SELECT("comuna.id","comuna.nombre");

                    $comentarios =  Comment::all();
                    $categorias   = Categorias::all();
                    $tipo_servicios = TipoServicios::all();
                    
                    $data_tipoServicios = DB::table("servicios_escort")
                    ->select("servicios_escort.id_escort","servicios_escort.id_tipo_servicio","tipo_servicios.nombre_servicio")
                    ->join("tipo_servicios","tipo_servicios.id","=","servicios_escort.id_tipo_servicio")
                    ->get();
            }

      }
    
       
     
       return view('admin.dashboard', compact('data','sql_foto_escort','regiones','comunas','sql_desc_comuna','vista','clientes','count','ldate','usuario','likes_user','seen','coments_escort',
       'comentarios','categorias','tipo_servicios','data_tipoServicios','nombre_region','listEscort'));
        
    }
}
