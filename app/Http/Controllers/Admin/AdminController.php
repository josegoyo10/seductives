<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Escort;
use App\Perfil;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user   = Auth::user();


        $escort = DB::table('escorts')
                  ->where('email','=',$user->email);

      
       // $data = Perfil::where('id_escort','=',$escort->id);
        
        //dd($data->foto_principal);
       

        return view('admin.layout',compact('data'));
    
    
    }
}