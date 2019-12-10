<?php

namespace App\Http\Controllers;
use App\Events\WebsocketDemoEvent;
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
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class PagesController extends Controller
{
    //
      public function home($categorias=null) {

		// $posts = Post::whereNotNull('published_at')
		// 	->where('published_at','<=', Carbon::now())
		// ->latest('published_at')->get();

		//\broadcast(new WebsocketDemoEvent('some data'));

       // se llama a el query scope declarado en el modelo Post llamdo scopePublished de esta forma
		//podemos reusar con una sola linea

		//$posts = Post::published()->paginate(1);

		$details = json_decode(file_get_contents("http://ipinfo.io/json"));

		$regiones =  Region::where('nombre','LIKE',"%{$details->city}%")->get();

		$opciones =  Input::get('opciones');
		$nombre_region = trim(str_replace("Región Metropolitana de", " ", $regiones[0]->nombre));

		//dd($opciones);

		//dd($nombre_region);

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
								->where("escorts.id_estado",'=','3')
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
    	return view('welcome', compact('data','noticias','today','tipo_servicios','nombre_region'));


	}


   public function searchall() {

	$noticias = DB::table("news")
	->select("news.escort_id","news.descripcion","news.created_at","perfiles.foto_principal")
	->join("perfiles","perfiles.id_escort","=","news.escort_id")
	->get();

	$today = Carbon::today()->toDateString();

	$tipo_servicios = TipoServicios::all();

	$nombre_region =  null;

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

	return view('welcome', compact('data','noticias','today','tipo_servicios','nombre_region'));

   }


    public function filterOpciones () {

		$opciones =  Input::get('opciones');
		$filtro   =  Input::get('filtro');
		$filter   = Input::get('filter');
	//dd($filter);

		$tipo_servicios = TipoServicios::all();

	if (isset($opciones)) {
		$noticias = DB::table("news")
		->select("news.escort_id","news.descripcion","news.created_at","perfiles.foto_principal")
		->join("perfiles","perfiles.id_escort","=","news.escort_id")
		->get();

		$today = Carbon::today()->toDateString();

		//$data = Perfil::whereIn('caracteristica_fisicas', $opciones)->get();

	   // En caso que el filtro sea edad.
	 //dd($filter);
	    if (($filter == "Edad")) {

			$data = [];
			foreach($opciones as $key=>$value) {
				$myArray = explode('-', $value);

						$sql = DB::table("escorts")
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
						->leftjoin("perfiles","perfiles.id_escort","=","escorts.id")
						->leftjoin("regiones","regiones.id","=","perfiles.region")
						->leftjoin("comuna", "comuna.id", "=", "perfiles.comuna")
						->whereBetween('edad', [$myArray[0] ,$myArray[1] ])
						->get();
						//
						$data[] = $sql;
						$collection = collect($data);

			}
			$results = $collection->flatten();

			return response()->json(['success' => true,
									'Message' => 'existe filtro.',
									'resultados' => $results]);

		} elseif (($filter == "Precio")) {
			$data = [];
			foreach($opciones as $key=>$value) {
				$myArray = explode('-', $value);

						$sql = DB::table("escorts")
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
						->leftjoin("perfiles","perfiles.id_escort","=","escorts.id")
						->leftjoin("regiones","regiones.id","=","perfiles.region")
						->leftjoin("comuna", "comuna.id", "=", "perfiles.comuna")
						->whereBetween('precio', [$myArray[0] ,$myArray[1] ])
						->get();
						//
						$data[] = $sql;
						$collection = collect($data);

			}
			$results = $collection->flatten();


					return response()->json(['success' => true,
					'Message' => 'existe filtro.',
					'resultados' => $results]);


		} elseif (($filter == "Servicios")) {

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
						->leftjoin("perfiles","perfiles.id_escort","=","escorts.id")
						->leftjoin("regiones","regiones.id","=","perfiles.region")
						->leftjoin("comuna", "comuna.id", "=", "perfiles.comuna")
						 ->JOIN ("servicios_escort","servicios_escort.id_escort", "=","perfiles.id_escort")
						 ->JOIN ("tipo_servicios","tipo_servicios.id", "=","servicios_escort.id_tipo_servicio")
						 ->whereIn('tipo_servicios.nombre_servicio', $opciones)
						->get();


						return response()->json(['success' => true,
						'Message' => 'existe filtro.',
						'resultados' => $data]);

		} else {


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
						->leftjoin("perfiles","perfiles.id_escort","=","escorts.id")
						->leftjoin("regiones","regiones.id","=","perfiles.region")
						->leftjoin("comuna", "comuna.id", "=", "perfiles.comuna")
						->whereIn('caracteristica_fisicas', $opciones)
						->orwhereIn('color_piel',$opciones)
						->orwhereIn('color_cabello',$opciones)
						->get();


					//return $data;
					return response()->json(['success' => true,
							'Message' => 'existe filtro.',
							'resultados' => $data]);
				//->join("servicios_escort", "servicios_escort.id_escort", "=", "perfiles.id_escort")
				//->join("tipo_servicios", "tipo_servicios.id", "=", "servicios_escort.id_tipo_servicio")

			   }

		  } else {
					return response()->json(['error' => false,
					'Message' => 'no existe.',
					'resultados' =>"0"]);
			   }

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
