<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegistroController extends Controller
{
    //

    public function create(Request $request) {

      //var_dump($request);

       //   $this->validate(request(),[
       // 		  'name' => 'required|string|max:25', 
       // 		  'last_name' => 'required|string|max:25',
       // 		  'email'  => 'required|string|email|max:100', 'unique:users',
       // 		  'password' => 'required|string|min:8'
       // ]);
      
        $usuario = User::create(['name' => $request->get('name'),
								'last_name'  => $request->get('last_name'),
								'email'  => $request->get('email'),
								'id_tipo_usuario' => $request->get('id_tipo_usuario'),
								'password' => Hash::make($request->get('password'))
							]);
     //     return User::create([
     //        'name' => $data['name'],
     //        'last_name' => $data['last_name'],
     //        'email' => $data['email'],
     //        'id_tipo_usuario' => $data['id_tipo_usuario'],
     //        'password' => Hash::make($data['password']),

     //    ]);

    	
    }






}
