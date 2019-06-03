<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Escort;
use App\Perfil;
use App\Escort_Fotos;
use Illuminate\Support\Facades\DB;


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
		$data = DB::table("escorts")
						->select("escorts.nombres","escorts.apellidos","escorts.email",
						 "escorts.nacionalidad",
						 "perfiles.edad",
						 "perfiles.comuna",
						 "perfiles.telefono",
						 "perfiles.altura",
						 "perfiles.medidas",
						 "perfiles.foto_principal")
						->join("perfiles","perfiles.id_escort","=","escorts.id")
						->orderby('escorts.id')
				    ->get();


    	return view('welcome', compact('data'));


	}



}
