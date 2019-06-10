<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Escort_Fotos;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    //
		    public function store(Request $request)
		 	{

             

		            $path = public_path().'/uploads_escorts/';
		            $files = $request->file('file');
		            
		            $id_escort = Input::get('id_escort');

		          // dd($id_escort);
                     
                       if($files)  {
				                
				                foreach($files as $file)
				                { 
				                        
				                  $escort_fotos   = new Escort_Fotos();
				                  $escort_fotos->id_escort =  $id_escort;
				                  $escort_fotos->id_perfil =  $id_escort;
				                  $name  	 = time().$file->getClientOriginalName();
				                  $photos 	 =  $file->move($path, $name);  
				                  $escort_fotos->url_fotos = $name;

				                   $escort_fotos->save();
				                }  


           
				        }


		    }


}
