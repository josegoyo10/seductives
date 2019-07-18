<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Redirect;
use Carbon\Carbon;


class NewsController extends Controller
{
    

    public function store(Request $request)
	{

		$fecha = Carbon::now()->format('Y-m-d');
		//dd($fecha);
		$count = News::where(['escort_id'=>$request->get('escort_id')])
					 ->whereDate('created_at', $fecha)	  
		             ->count();


	   //dd($count);
	   if ($count < 3) {
		 $this->validate($request, [
			   'add_news_escort' => 'required'
			   
			  ],
			    [
              	  'add_news_escort.required' => 'El campo agregar noticia no puede estar vacio'
                
                ]
			
			);


		     $news = News::create(['user_id' => auth()->id(),
		                        'escort_id' => $request->get('escort_id'),
								 'descripcion' => trim($request->get('add_news_escort')),
								 'cantidad_news' => 1
		 					      
		 					]);
	  	     return redirect()->back()->with('success', 'Tu Mensaje fue Guardado Exitosamente');
	   } else {
		   $message = "Solo puedes publicar un máximo de 3 historias por dia..";
	    	return Redirect::back()->withInput()->withErrors(array('cantidad_news' => $message));
			//return Redirect::back()->withErrors('errors', 'Solo puedes publicar un máximo de 3 historias por dia..');
		
	   }



	}
}
