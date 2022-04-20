<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrganizerFollowers extends Model
{
    public function getOrganizer()
    {
        return $this->belongsTo('App\Organizer', 'organizer_id');
    }
}
