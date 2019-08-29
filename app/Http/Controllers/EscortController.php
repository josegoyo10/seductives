<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Response;
use App\Escort;
use App\Perfil;
use App\Escort_Fotos;
use App\Region;
use App\Comuna;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Image;

class EscortController extends Controller
{
    //
        public function index() 
        {
            $fecha = Carbon::now()->format('d-m-Y H:i:s') ;
            //$fecha =  $mytime->toDateTimeString();

            $regiones = Region::all();
            $comunas   = Comuna::all();

            return view('escort.index', compact('fecha','regiones','comunas'));
        }

        public function store(Request $request) {
          
           // $this->validate($request, [
          //     'photos' => 'required',
          //     'photos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
          // ]);
          request()->validate([

            'rut' => 'required|min:2|max:50',

            'nombres' => 'required|string',
            
            'apellidos' => 'required|string',

            'apodo_escort' =>'required|string',

            'email' => 'required|email|unique:users',

            'fecha_nacimiento' => 'required',                

            'nacionalidad' => 'required',

            'sexo' => 'required',

            'telefono' => 'required|string', 

             'photo_principal'    => 'required|image|mimes:jpeg,png,jpg|',
             'photo_secundaria_1' => 'required|image|mimes:jpeg,png,jpg|',
             'photo_secundaria_2' =>  'required|image|mimes:jpeg,png,jpg|',

        ], [

           'run.required' => 'El run es requerido',
          
           'nombres.required' => 'El nombre es requerido',
          
           'apellidos.required' => 'El apellido es requerido',

           'apodo_escort.required' => 'El apodo es requerido',

           'email.required' => 'El email es requerido',
           
           'fecha_nacimiento.required' => 'Fecha de Nacimiento es requerido',

           'nacionalidad.required' => 'La Nacionalidad es requerido',

           'sexo.required' => 'El sexo es requerido',

           'telefono.required' => 'El telefono es requerido',
          
           'photo_principal.required' => 'La Foto principal es requerida',

           'photo_secundaria_1.required' => 'La Foto secundaria 1 es requerida',

           'photo_secundaria_2.required' => 'La Foto secundaria 2 es requerida',

        ]);


          if($request->hasfile('photo_principal'))
          {
             $image = $request->file('photo_principal');
             $name   = time().$image->getClientOriginalName();
            // $photo_principal = \Storage::disk('images')->put($name, \File::get($file));
            // $url_principal =  Storage::url($file);
           // $file = request()->file('photo_principal')->store('public');
           //\Storage::disk('images')->put($name, \File::get($image));

           $destinationPath = public_path('/uploads/escort_fotos');
           $imagePath = $destinationPath. "/".  $name;
         //  dd($imagePath);
         //  $image->move($destinationPath, $name);

           //Resize image here
            $thumbnailpath =  $destinationPath. "/".  $name;
            //dd($thumbnailpath);

            $img = Image::make($image)->resize(200, 150)->save(public_path('/uploads/escort_fotos/'.$name));
        
          //  dd($img);

          //   $img->move($destinationPath, $thumbnailpath);
            $url_principal =  $name;
                      
          }
          
          if ($request->hasfile('photo_secundaria_1')) {
            
            // $file_1 = request()->file('photo_secundaria_1')->store('public');
            // $url_secundaria_1 =  Storage::url($file_1);
            
            $image_1 = $request->file('photo_secundaria_1');
            $name_1   = time().$image_1->getClientOriginalName();
            $destinationPath01 = public_path('/uploads/escort_fotos');
            $imagePath = $destinationPath01. "/".  $name_1;
            $img02 = Image::make($image_1)->resize(600, 400)->save(public_path('/uploads/escort_fotos/'.$name_1));
            $url_secundaria_1 =  $name_1;
              
          
            // $image_1->move($destinationPath01, $name_1);
          } 
          
          if ($request->hasfile('photo_secundaria_2')) {

            // $file_2           = request()->file('photo_secundaria_2')->store('public');
            // $url_secundaria_2 =  Storage::url($file_2);
            $image_2 = $request->file('photo_secundaria_2');
            $name_2   = time().$image_2->getClientOriginalName();
            $destinationPath02 = public_path('/uploads/escort_fotos');
            $imagePath = $destinationPath02. "/".  $name_2;
           // $image_2->move($destinationPath02, $name_2);
           $img02 = Image::make($image_2)->resize(600, 400)->save(public_path('/uploads/escort_fotos/'.$name_2));

            $url_secundaria_2 =  $name_2;

          }

      

      //    $validator = Validator::make($request->all(), [
      //       'name' => 'required|max:25',
      //       'last_name' => 'required|max:30',
      //       'email' => 'required|email|max:255|unique:users',
      //       'password' => 'required|min:6|confirmed',
      //   ]);
      
        //Primero Guardo en la tabla escorts.
        
          $escort                      = new Escort();
           $escort->rut                 = $request->rut;
           $escort->nombres             = $request->nombres;
           $escort->apellidos           = $request->apellidos;
           $escort->apodo_escort        = $request->apodo_escort;
           $escort->email               = $request->email;
           $escort->sexo                = $request->sexo;
           $escort->comentario_escort   = $request->comentario_escort;
           $escort->fecha_nacimiento    = $request->fecha_nacimiento;
           $escort->nacionalidad        = $request->nacionalidad;
           $escort->id_estado           = "1";
           $escort->save();

           //Obtener el ID del valor guardado en escort y luego insertarlo en la 
           //tabla Perfiles.
           $perfil                    = new Perfil();
           $perfil->id_escort         = $escort->id;
           $perfil->id_categoria      = "1";
           $perfil->foto_principal    = $url_principal;	
           $perfil->foto_secundaria_1 = $url_secundaria_1;
           $perfil->foto_secundaria_2 = $url_secundaria_2;
           $perfil->seo_slug          = '';
           $perfil->region            = $request->regiones;
           $perfil->comuna            = $request->comunas;
           $perfil->descripcion       = $request->descripcion;
           $perfil->altura            = $request->altura;
           $perfil->edad              = $request->edad_cliente;
           $perfil->medidas           = $request->medidas;
           $perfil->atencion          = $request->atencion;
           $perfil->telefono          = $request->telefono;
           $perfil->precio            = $request->precio;
           $perfil->fecha_registro    = now();
           $perfil->id_estado         = $request->id_estado;
           $perfil->save();

         
         // Luego en la tabla escort_fotos añado las fotos de la escort

            // if($request->hasfile('photos'))
            // {
                
            //    foreach($request->file('photos') as $image)
            //     { 
                        


            //       $escort_fotos   = new Escort_Fotos();
            //       $escort_fotos->id_escort = $escort->id;
            //       $escort_fotos->id_perfil =  $escort->id;
            //       $name   = $image->getClientOriginalName();
            //       $photos =  $image->move(public_path().'/images/', $name);  
            //       $escort_fotos->url_fotos = Storage::url($photos);

            //         $escort_fotos->save();
            //     }
            // }

         
              return back()->with('success', 'Su registro ha sido Exitoso, nosotros nos contactaremos contigo a la brevedad posible...Muchas Gracias');

        

      }
      

      //Obtener Informacion de la Escort
        public function getEscortInfo () {

            $id = Input::get('id');
            
            //return $id;
                    
            $query = DB::table("escorts")
						->select("escorts.id","escorts.nombres","escorts.apellidos",
						 "escorts.nacionalidad",
						 "perfiles.edad",
						 "perfiles.comuna",
						 "perfiles.telefono",
						 "perfiles.altura",
						 "perfiles.medidas",
             "perfiles.foto_principal",
             "perfiles.foto_secundaria_1",
             "perfiles.foto_secundaria_2" )
						->join("perfiles","perfiles.id_escort","=","escorts.id")
						->WHERE("escorts.id", "=", $id)
				    ->first();

                        
         
           // return ['success' => true, 'data' => $data];
          //  return Response::json(array(
          //         'success' => true,
          //        'data'   => $data
          //  )); 
            
          return Response::json(['success' => true, 'respuesta' => $query]);
          
        }

      //
      public function getPerfilEscort($id) {

        $data = DB::table("escorts")
        ->select("escorts.id","escorts.nombres","escorts.apellidos",
         "escorts.nacionalidad",
         "escorts.apodo_escort",
         "perfiles.edad",
         "perfiles.comuna",
         "perfiles.telefono",
         "perfiles.altura",
         "perfiles.medidas",
         "perfiles.atencion",
         "perfiles.dias_disponibles",
         "perfiles.precio",  
         "perfiles.color_piel",
         "perfiles.color_cabello",
         "perfiles.descripcion",
         "perfiles.foto_principal",
         "perfiles.foto_secundaria_1",
         "perfiles.foto_secundaria_2",
         "regiones.nombre as descripcion_region",
         "comuna.nombre as descripcion_comuna",
         "escort_video.desc_video" )
        ->join("perfiles","perfiles.id_escort","=","escorts.id")
        ->leftjoin("escort_video","escort_video.escort_id","=","escorts.id")
        ->join("regiones","regiones.id","=","perfiles.region")
        ->join("comuna", "comuna.id", "=", "perfiles.comuna")
        ->WHERE("escorts.id", "=", $id)
        ->first();
        
        $precio_escort = Escort::formato_precio($data->precio);
        $telefono_whatsapp = str_replace(' ', '', $data->telefono);
        $telefono_escort = str_replace(' ', '', $data->telefono);
      // dd($telefono_escort); 
       
       $servicio_escort = DB::table("servicios_escort")
       ->select("servicios_escort.id_escort","tipo_servicios.nombre_servicio")
       ->join("tipo_servicios","tipo_servicios.id","=","servicios_escort.id_tipo_servicio")
       ->WHERE("servicios_escort.id_escort", "=", $id)
       ->get();


      //dd($servicio_escort);

       //obtener las fotos de la escort
       $sql_foto_escort = DB::table("escort_fotos")
       ->select("escort_fotos.id","escort_fotos.url_fotos")
       ->WHERE("escort_fotos.id_escort", "=", $id)
       ->get();

       $noticias = DB::table("news")
       ->select("news.escort_id","news.descripcion","news.created_at","perfiles.foto_principal")
       ->join("perfiles","perfiles.id_escort","=","news.escort_id")
       ->get();

       $today = Carbon::today()->toDateString();

 
          
          return view('escort.perfilpublico_escort',compact('data','sql_foto_escort','ruta_video','noticias','today','precio_escort','servicio_escort','telefono_escort','telefono_whatsapp'));
      }












} // fin class
