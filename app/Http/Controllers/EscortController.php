<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Response;
use App\Escort;
use App\Perfil;
use App\Escort_Fotos;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;


class EscortController extends Controller
{
    //
        public function index() 
        {
            $fecha = Carbon::now()->format('d-m-Y H:i:s') ;
            //$fecha =  $mytime->toDateTimeString();

            return view('escort.index', compact('fecha'));
        }

        public function store(Request $request) {
          
           // $this->validate($request, [
          //     'photos' => 'required',
          //     'photos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
          // ]);

          if($request->hasfile('photo_principal'))
          {
            //  $file = $request->file('photo_principal');
            //  $name   = time().$file->getClientOriginalName();
            // $photo_principal = \Storage::disk('images')->put($name, \File::get($file));
            // $url_principal =  Storage::url($file);
            $file = request()->file('photo_principal')->store('public');
            $url_principal =  Storage::url($file);
                      
          }
          
          if ($request->hasfile('photo_secundaria_1')) {
            
            $file_1 = request()->file('photo_secundaria_1')->store('public');
            $url_secundaria_1 =  Storage::url($file_1);

          } 
          
          if ($request->hasfile('photo_secundaria_2')) {

            $file_2           = request()->file('photo_secundaria_2')->store('public');
            $url_secundaria_2 =  Storage::url($file_2);

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
           $perfil->horario           = $request->horario;
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
				    ->get();

                        
         
           // return ['success' => true, 'data' => $data];
          //  return Response::json(array(
          //         'success' => true,
          //        'data'   => $data
          //  )); 
            
          return Response::json(['success' => true, 'respuesta' => $query]);
          
        }












} // fin class
