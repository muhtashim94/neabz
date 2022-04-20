<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventTags extends Model
{
    public function getEventTag()
    {
        return $this->belongsTo('App\Tags', 'event_tag_id');
    }
}
