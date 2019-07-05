<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'likes_escort';
    protected $fillable = ['user_id', 'escort_id','escort_foto_id','likes_count','seen'];

    public function user(){
        return $this->belongsTo(User::class);
      }
      public function escort(){
        return $this->belongsTo(Escort::class);
      }


}
