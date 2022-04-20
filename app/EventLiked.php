<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventLiked extends Model
{
    protected $fillable = [
        'user_id', 'event_id', 'is_liked'
    ];
}
