<?php

namespace App\Http\Controllers\Admin;
use App\Rating;
use App\Escort;
use App\Http\Resources\Rating as RatingResource;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{
    
    public function setrating(Request $request) {
         
        return new RatingResource (Rating:: create ([
            'escort_id' =>"1",
            'user_id' =>"2",
            'rating' => $request->get('rating')
        ]));
    }


     public function listarEscort (Request $request) {

              //$listEscort = Escort::all();

              $listEscort = DB::table("escorts")
              ->SELECT("escorts.id","escorts.nombres","escorts.apellidos","perfiles.foto_principal")
              ->JOIN("perfiles","perfiles.id_escort",'=',"escorts.id")
              ->get();
                 



              return response()->json($listEscort);
     }
}
