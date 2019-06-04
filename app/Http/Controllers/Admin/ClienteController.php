<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClienteController extends Controller
{
    //

        public function index()
        {

            return view('admin.clientes.index');
        }



}
