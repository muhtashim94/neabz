<?php

namespace App;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{

    public function getOrganizer()
    {
        return $this->belongsTo('App\Organizer', 'organizer_id');
    }
    public function getTags()
    {
        return $this->belongsTo('App\Tags', 'event_tag_id');
    }


    public function getEventType()
    {
        return $this->belongsTo('App\EventType', 'type_id');
    }

    public function getEventCategory()
    {
        return $this->belongsTo('App\EventCategory', 'category_id');
    }

    public function getEventSubCategory()
    {
        return $this->belongsTo('App\EventSubCategory', 'sub_category_id');
    }

    public function getTimeZone()
    {
        return $this->belongsTo('App\TimeZone', 'time_zone_id');
    }
    public function getEventDateNTime()
    {
        return $this->hasOne('App\EventDateTime', 'event_id');
    }
    public function getEventTickets()
    {
        return $this->hasOne('App\EventTickets', 'event_id');
    }

    public function getEventTags()
    {
        return $this->hasOne('App\EventTags', 'event_id');
    }

    public function getUserEventDateNTime()
    {
        // $dt = Carbon::now()->toDateString();
        return $this->hasOne('App\EventDateTime', 'event_id');
    }



}
