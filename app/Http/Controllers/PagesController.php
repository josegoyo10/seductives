<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Escort;
use App\Perfil;
use App\Escort_Fotos;
use App\News;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PagesController extends Controller
{
    //
      public function home() {

		// $posts = Post::whereNotNull('published_at')
		// 	->where('published_at','<=', Carbon::now())
		// ->latest('published_at')->get();

       // se llama a el query scope declarado en el modelo Post llamdo scopePublished de esta forma
		//podemos reusar con una sola linea
       
		//$posts = Post::published()->paginate(1);

		$noticias = DB::table("news")
					->select("news.escort_id","news.descripcion","news.created_at","perfiles.foto_principal")
					->join("perfiles","perfiles.id_escort","=","news.escort_id")
					->get();

		$today = Carbon::today()->toDateString();
	
	
		$data = DB::table("escorts")
						->select("escorts.id","escorts.nombres","escorts.apellidos","escorts.email",
						 "escorts.nacionalidad",
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
						->orderby('escorts.id')
				    ->get();


    	return view('welcome', compact('data','noticias','today'));


	}



}
