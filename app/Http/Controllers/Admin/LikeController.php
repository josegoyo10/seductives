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
    public function LikeEscort(Request $request) {
        $user = Auth::user(); 
        $id_like_user = Input::get('id');
        $estado       = Input::get('estado');
        $valor_like = 0;
        //Realizo un contador de likes que le haya dado el usuario logueado a la escort
        $cont = Like::where(['user_id' => $user->id,'escort_id' => $id_like_user])->count();
        
        // Realizo otro contador para validar si ya la escort le han dado likes a esa foto
        $existe_like = Like::where(['user_id' => $user->id,'escort_foto_id' => $id_like_user])->count();
      //dd($estado);

        if ((!$existe_like) && ($estado == 1)) {
            Like::create([
                'user_id' => Auth::id(),
                'escort_id' =>  $id_like_user,
                'escort_foto_id' => 1,
                'likes_count' => 1,
                'seen' => 1

            ]);
            $valor_like = 1;
        } else {
            if (($estado == '1') && ($cont > 0)) {

                    $valor_like = 1;
                    $update_like =  Like::findOrFail($id_like_user);
                    $update_like->likes_count = $valor_like;
                    $update_like->save();

             } else if ($estado == '0') {
               
               
                $valor_like = $cont - 1;
                $update_like =  Like::findOrFail($id_like_user);
                $update_like->likes_count = $valor_like;
                $update_like->save();
               
               

               }
           } 

            return  $valor_like;
      }




}
