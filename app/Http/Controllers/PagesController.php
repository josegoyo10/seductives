<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Escort;
use App\Perfil;
use App\Escort_Fotos;
use App\News;
use App\Region;
use App\TipoServicios;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Response;

class PagesController extends Controller
{
    //
      public function home($categorias=null) {

		// $posts = Post::whereNotNull('published_at')
		// 	->where('published_at','<=', Carbon::now())
		// ->latest('published_at')->get();

       // se llama a el query scope declarado en el modelo Post llamdo scopePublished de esta forma
		//podemos reusar con una sola linea
       
		//$posts = Post::published()->paginate(1);
		
		$details = json_decode(file_get_contents("http://ipinfo.io/json"));

		$regiones =  Region::where('nombre','LIKE',"%{$details->city}%")->get();

		$opciones =  Input::get('opciones');

		//dd($opciones);
	  
		//dd($regiones);

		$vista =  Input::get('filtro');
		
		$tipo_servicios = TipoServicios::all();
		$noticias = DB::table("news")
					->select("news.escort_id","news.descripcion","news.created_at","perfiles.foto_principal")
					->join("perfiles","perfiles.id_escort","=","news.escort_id")
					->get();

		$today = Carbon::today()->toDateString();
	
		$buscar = Input::get('search_escort');
		//$categorias = Input::get('categoria');

		if  ($opciones != '') {

			$data = DB::table("escorts")
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
					$data = DB::table("escorts")
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

					$data = DB::table("escorts")
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
								->orderby('escorts.id')
							->get();
				} else {
					if ( $categorias != '') {

						$id_categoria = DB::table("categorias")
						->select("categorias.id")
						->where("categorias.nombre",'=',$categorias)->first();
					
							if ($id_categoria <> null) {
					

								$data = DB::table("escorts")
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
							$data = DB::table("escorts")
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
    	return view('welcome', compact('data','noticias','today','tipo_servicios'));


	}


   public function searchall($filtro) {
	
	$noticias = DB::table("news")
	->select("news.escort_id","news.descripcion","news.created_at","perfiles.foto_principal")
	->join("perfiles","perfiles.id_escort","=","news.escort_id")
	->get();

	$today = Carbon::today()->toDateString();

	$tipo_servicios = TipoServicios::all();

	$data = DB::table("escorts")
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
	->orderby('escorts.id')
	->get();
	
	return view('welcome', compact('data','noticias','today','tipo_servicios'));
	
   }


    public function filterOpciones () {

		$opciones =  Input::get('opciones');

		$tipo_servicios = TipoServicios::all();

		$noticias = DB::table("news")
		->select("news.escort_id","news.descripcion","news.created_at","perfiles.foto_principal")
		->join("perfiles","perfiles.id_escort","=","news.escort_id")
		->get();

		$today = Carbon::today()->toDateString();

		//$data = Perfil::whereIn('caracteristica_fisicas', $opciones)->get();
		$data = DB::table("escorts")
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

		//return $data;
		return response()->json(['success' => true, 
				  'Message' => 'Your category was created.',  
				  'resultados' => $data]);
		//return view('welcome', compact('data','noticias','today','tipo_servicios'));
		//return view('welcome', compact('data','noticias','today','tipo_servicios'));
		
	
	
	}



	public function getGeoLocationxx () {
		
		$details = json_decode(file_get_contents("http://ipinfo.io/json"));

		$regiones =  Region::where('nombre','LIKE',"%{$details->city}%")->get();
		//dd($regiones[0]->id);

		$noticias = DB::table("news")
		->select("news.escort_id","news.descripcion","news.created_at","perfiles.foto_principal")
		->join("perfiles","perfiles.id_escort","=","news.escort_id")
		->get();

		$today = Carbon::today()->toDateString();
		
		$vista = Input::get('vista');

		$data = DB::table("escorts")
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
		->orWhere("perfiles.region","=",$regiones[0]->id)
		->orderby('escorts.id')
		->get();
	   
		return Response::json( array(
			'data' => $data, 
			'vista' => $vista
			));
	
		
		//view('welcome', compact('data','noticias','today','vista'));
	
		
	}



}
