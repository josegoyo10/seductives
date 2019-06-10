<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Response;
use App\Escort;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //

    public function store(Request $request)

    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:25',
            'last_name' => 'required|max:30',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        if ($validator->passes()) {


                 //antes de registrarse la escorts.
                 //verificar si el email ingresado de la escorts existe en la tabla escorts.
                 $escort = Escort::where(['email' =>  $request->get('email')])
                                 ->Where(['id_estado' =>  "3"])
                                 ->count();
                 //dd($escort);

                  //EL USUARIO ES UNA ESCORTS Y ESTA APROBADO
                 if ($escort == 1) {

                        $user = User::create([
                            'name' => $request->get('name'),
                            'last_name' => $request->get('last_name'),
                            'email' => $request->get('email'),
                            'id_estado' => "3",
                            'id_tipo_usuario' =>"1",
                            'password' => Hash::make($request->get('password'))

                         ]);
                 

                    }else {

                       //Indica que es un usuario registrado

                         $user = User::create([
                            'name' => $request->get('name'),
                            'last_name' => $request->get('last_name'),
                            'email' => $request->get('email'),
                            'id_estado' => "3",
                            'id_tipo_usuario' =>"2",
                            'password' => Hash::make($request->get('password'))

                         ]);

                    }



             return Response::json(['success' => '1']);

        }

        return Response::json(['errors' => $validator->errors()]);
 
    }





}
