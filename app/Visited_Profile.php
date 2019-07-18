<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visited_Profile extends Model
{
    protected $table = 'visited_profile';
    protected $fillable = ['user_id', 'escort_id','seen','fecha'];

    public function user(){
        return $this->belongsTo(User::class);
      }
      public function escort(){
        return $this->belongsTo(Escort::class);
      }
}
