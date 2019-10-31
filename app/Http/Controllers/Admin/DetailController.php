<?php

namespace App\Http\Controllers\Admin;
use App\Rating;
use App\Escort;
use App\Servicios_Evaluados;
use App\Http\Resources\Rating as RatingResource;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DetailController extends Controller
{
    
    public function setrating(Request $request) {
         
       
        $rating = new Rating;
        $servicios = Input::get('arrayServices');

        $rating->escort_id               = Input::get('escort_id');
        $rating->user_id                 =  Auth::user()->id;
        $rating->rating_total            = $request->get('valor_nota');
        $rating->comentarios_users       = $request->get('comentario_user');
        $rating->llamada                 = $request->get('llamada_escort');
        $rating->lugar_atencion          = $request->get('lugar_atencion_escort');
        $rating->presentacion_personal   = $request->get('presentacion_escort');
        $rating->rostro                  = $request->get('rostro_escort');
        $rating->busto                   = $request->get('busto_escort');
        $rating->trasero                 = $request->get('trasero_escort');
        // $rating->besos                   = $request->get('besos_escort');
        // $rating->quejidos                = $request->get('quejido_escort');
        // $rating->mov_pelvicos            = $request->get('mov_pelvicos_escort');
        // $rating->sexo_oral               = $request->get('sexo_oral_escort');
        // $rating->sexo_vaginal            = $request->get('sexo_vaginal_escort');
        // $rating->sexo_anal               = $request->get('sexo_anal_escort');
        $rating->fecha_calificacion      = Carbon::now()->toDateTimeString();
        $rating->save();

        $lastInsertedIdRating= $rating->id; //obtengo el ultimo ID insertado 
        
      //  dd( $servicios );

        
        foreach($servicios as $key => $value) {
            $servicios_eval = new Servicios_Evaluados;
            $servicios_eval->id_rating = $lastInsertedIdRating;
            $servicios_eval->nombre_servicio = $value['nombre_servicio'];
            $servicios_eval->valor_servicio_evaluado = $value['valor_servicio_evaluado'];

             $servicios_eval->save();

        }
       


        if ($rating) {
            $sql_rating_total =  DB::table('ratings')->where("escort_id",'=',Input::get('escort_id'))
                                   ->sum('rating_total');

            //  dd("suma:".$sql_rating_total);

            $count_escort = Rating::where('escort_id','=', Input::get('escort_id'))->count();
            $nota_final =   $sql_rating_total/ $count_escort;
             
            return response()->json(['nota_final' => round($nota_final,2), 'message' => 1]);
            
        } else {

            return response()->json(['nota_final' => 0, 'message' => 0]);
        }
      
    }


     public function listarEscort (Request $request) {

              //$listEscort = Escort::all();

              $listEscort = DB::table("escorts")
              ->SELECT("escorts.id","escorts.nombres","escorts.apellidos","perfiles.foto_principal")
              ->JOIN("perfiles","perfiles.id_escort",'=',"escorts.id")
              ->get();
                 



              return response()->json($listEscort);
     }

     public function showCalifications (Request $request) {

        //$listEscort = Escort::all();
        $id_escort = $request->get('escort_id');
   

        $count_escort = Rating::where('escort_id','=',  $id_escort)->count();

        $listEscort =   DB::table("ratings")
           ->select(DB::raw("SUM(llamada) as llamada,
                             SUM(lugar_atencion) as lugar_atencion,
                             SUM(presentacion_personal) as 	presentacion_personal,
                             SUM(rostro) as rostro,
                             SUM(busto) as busto,
                             SUM(trasero) as trasero                           

                            "))
           ->where("escort_id",'=', $id_escort)
           ->orderBy("id")
           ->groupBy(DB::raw("escort_id"))
           ->get();  
            
           //dd($listEscort);

           $comentarios_user = DB::table("ratings")
                    ->select(DB::raw('users.id as id_user,DATE_FORMAT(ratings.fecha_calificacion,"%d/%m/%Y") as fecha_calificacion, users.name,ratings.rating_total,ratings.comentarios_users as comentario'))
                    ->JOIN("users","users.id",'=',"ratings.user_id")
                    ->where("escort_id",'=', $id_escort)
                    ->orderBy("ratings.id")
                    ->get();

           
            return response()->json(['data' => $listEscort,
                                      'contador' => $count_escort,
                                      'comentarios' => $comentarios_user,
                                      'message' => '1']);
       }
     


}
