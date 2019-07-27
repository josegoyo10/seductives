<?php

namespace App\Http\Controllers\Admin;
use App\Rating;
use App\Http\Resources\Rating as RatingResource;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class DetailController extends Controller
{
    
    public function setrating(Request $request) {
        return new RatingResource (Rating:: create ([
            'escort_id' => $request->get('escort_id'),
            'user_id' => $request->get('user_id'),
            'rating' => $request->get('rating')
        ]));
    }
}
