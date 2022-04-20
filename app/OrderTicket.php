<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderTicket extends Model
{
    public function getEvent()
    {
        return $this->belongsTo('App\Events', 'event_id');
    }

    public function getEventTicket()
    {
        return $this->belongsTo('App\EventTickets', 'event_id', 'event_id');
    }
}
