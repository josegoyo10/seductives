<?php

namespace App\Http\Controllers;
use App\Escort;
use App\Perfil;
use App\Escort_Fotos;
use App\Region;
use App\Comuna;
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
    public function index()
    {
        //return viesw('home');
        $user = Auth::user();
       // dd($user->id_tipo_usuario);
        
     if ($user->id_tipo_usuario == 1) {
       
        $sql_escort = DB::table("escorts")
        ->select("escorts.id","escorts.nombres","escorts.apellidos","escorts.email")
        ->WHERE("escorts.email", "=", $user->email)
        ->first();

        //dd($sql_escort);

        $data = DB::table("escorts")
        ->select("escorts.id","escorts.nombres","escorts.apellidos",
         "escorts.nacionalidad",
         "escorts.comentario_escort",
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
        ->WHERE("escorts.id", "=", $sql_escort->id)
        ->first();
        
         //dd($data);

       //obtener las fotos de la escort
       $sql_foto_escort = DB::table("escort_fotos")
       ->select("escort_fotos.id","escort_fotos.url_fotos")
       ->WHERE("escort_fotos.id_escort", "=", $sql_escort->id)
       ->get();

       $regiones = Region::all();
       $comunas   = Comuna::all();

       $sql_desc_comuna = DB::table("comuna")
       ->SELECT("comuna.id","comuna.nombre")
       ->WHERE("comuna.id",'=', $data->comuna)->first();

     }


        return view('admin.dashboard',compact('data','sql_foto_escort','regiones','comunas','sql_desc_comuna'));
        
    }
}
