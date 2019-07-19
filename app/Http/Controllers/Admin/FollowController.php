<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\FollowEscort;
use Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    //
     public function addfollow(Request $request) {

        $id_follower    =  Input::get('uid');
        $accion         =  Input::get('action');
        $user           = Auth::user(); 

        //status notificacion
        // 0: significa que no esta siguiendo.
        // 1: significa que envio petición de seguir a escort.
        // 2: significa que la escort acepto invitación, en caso de que escort rechaze status vuelve a 0.

        if ($accion == "follow") {

             $existe_follow = FollowEscort::where(['sender_id' => $user->id,'receiver_id' => $id_follower])->count();
            
             if ((!$existe_follow)) {
                FollowEscort::create([
                    'sender_id'         => Auth::id(),
                    'receiver_id'       =>  $id_follower,
                    'status_invitacion' => "1"
                ]);
        
            } else {
               
                 $update_follow =  FollowEscort::findOrFail($id_follower);
                 $update_follow->status_invitacion = 1;
                 $update_follow->save();
                       
                  
               }
            
            return "1";
        
        } elseif ($action == "unfollow") {
             
                 $update_follow =  FollowEscort::findOrFail($id_follower);
                 $update_follow->status_invitacion = 0;
                 $update_follow->save();

            return "2";
        } else {

            return "3";
        }
         

     }



}
