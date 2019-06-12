<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;
use App\Comuna;
use DB;

class ComunaAdminController extends Controller
{
    //

    public function updatecomboComuna($id) {


    	$comuna = DB::table("comuna")
                ->select("comuna.id",
                	   "comuna.nombre")
                ->where('comuna.id_region','=',$id )
            	->orderby('comuna.id')
                 ->get();
  
  

            return response()->json(['comuna' => $comuna], 200);


    }





}
