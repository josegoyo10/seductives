<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Response;

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

                $user = User::create([
                            'name' => $request->get('name'),
                            'last_name' => $request->get('last_name'),
                            'email' => $request->get('email'),
                            'id_tipo_usuario' =>$request->get('id_tipo_usuario'),
                            'password' => Hash::make($request->get('password'))

                    ]);

             return Response::json(['success' => '1']);

        }

        return Response::json(['errors' => $validator->errors()]);
 
    }





}
