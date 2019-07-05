<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Like;
use Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    //
    public function getAllLikeEscort() {

       $arregloId = Input::get('arreglo');
     
       foreach($arregloId as $value) {
        
          
          $cont = Like::where(['escort_id' => $value])->count();
         // dd( $cont);
          $data_array[] = array(
            'cont' => $cont,
            'escortId' => $value
            );
       }
    // dd($data_array);
   
       return response()->json($data_array);
        //dd($arregloId);
    }



    public function LikeEscort(Request $request) {
        $user           = Auth::user(); 
        $id_like_user   = Input::get('id');
        //$estado       = Input::get('estado');
        $valor_like = 0;

        //Realizo un contador de likes que le haya dado el usuario logueado a la escort
        //$cont = Like::where(['user_id' => $user->id,'escort_id' => $id_like_user])->count();
        $cont = Like::where(['escort_id' => $id_like_user])->count();
        
        // Realizo otro contador para validar si ya la escort le han dado likes a esa foto
        $existe_like = Like::where(['user_id' => $user->id,'escort_id' => $id_like_user])->count();

        //validar si esa foto ya tiene un like

     //dd($existe_like);

        if ((!$existe_like)) {
            Like::create([
                'user_id' => Auth::id(),
                'escort_id' =>  $id_like_user,
                'escort_foto_id' => 1,
                'likes_count' => 1,
                'dislike_count' => 0,
                'seen' => 1

            ]);
            $valor_like = 1;
        } else {
           
                    $update_like =  Like::findOrFail($id_like_user);
                    $update_like->likes_count = $cont + 1;
                    $update_like->save();
                   
                    $valor_like = Like::where(['escort_id' => $id_like_user])->count();
           }
           
           

            return  $valor_like;
      }




}
