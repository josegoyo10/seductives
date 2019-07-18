<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'escort_video';
    protected $fillable = ['user_id', 'escort_id','desc_video'];
}
