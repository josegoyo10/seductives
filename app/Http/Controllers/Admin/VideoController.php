<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Response;
use App\Video;
use Illuminate\Support\Facades\File;

class VideoController extends Controller
{
     public function index() {
      $user = Auth::user(); 

      $data = DB::table("users")
      ->WHERE("users.email",'=',  $user->email)->first();

      $email_usuario_sesion = auth()->user()->email;

      $clientes =  DB::table("escorts")
      ->select("escorts.id as Id_escort","escorts.rut",
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
      "escort_video.desc_video",
      "escort_video.id as id_video",

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
       ->join("escort_video","escort_video.escort_id","=","escorts.id")
      ->orderby('escorts.id')
      ->first();

        return view('admin.clientes.video',compact('data','clientes'));
     }



        public function upload_video(Request $request){ 
               $user = Auth::user(); 
               $data = $request->all();

               $escort = DB::table('escorts')
               ->where('email','=',$user->email)->first();

               $count = Video::where(['escort_id' => $escort->id])->count();

              // dd($escort);

               $rules=[
                      'video'  =>'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:100040|required'];
               $validator = Validator($data,$rules);

             if ($validator->fails()){
                 return redirect()
                             ->back()
                             ->withErrors($validator)
                             ->withInput();
                  }else{
                       if ($count > 0) {
                        return redirect()
                        ->back()
                        ->withErrors((array('video' => "Disculpe solo puede subir máximo 1 video")))
                        ->withInput();
                       } else {
                    
                    
                        $video = $data['video'];
                        $input = time().$video->getClientOriginalExtension();
                        
                        $destinationPath = 'uploads/videos';
                        $video->move($destinationPath, $input);
                        
                        Video::create([
                          'user_id' => Auth::id(),
                          'escort_id' =>  $escort->id,
                          'desc_video' => $input,
                          'created_at' =>  date('Y-m-d h:i:s'),
                          'updated_at' =>   date('Y-m-d h:i:s')
                      ]);
                            // $escort_video['desc_video']  = $input;
                            // $escort_video['created_at']  = date('Y-m-d h:i:s');
                            // $escort_video['updated_at']  = date('Y-m-d h:i:s');
                            // $escort_video['user_id']     =  $user->id;
                            // DB::table('escort_video')->insert($user);

                            return redirect()->back()->with('success','Subido Exitosamente');
                       }
                  }
          } 
          

          public function delete_video(Request $request){ 

            $data = $request->all();
            
            $image_path = "uploads/videos/".$request->descripcion_video; 

            if (file_exists($image_path)) {
           
                  @unlink($image_path);
           
              }

              DB::table('escort_video')
              ->where('escort_id','=', $data['escort_id'])
              ->Where('id','=', $data['id_video'])
              ->delete();
     
     
           return back()->with('success', 'Video eliminado'); 


          }








}
