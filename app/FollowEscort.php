<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FollowEscort extends Model
{
    protected $table = 'follow_escort';
    protected $fillable = ['sender_id', 'receiver_id','status_invitacion'];
}
