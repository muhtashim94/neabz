<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventBridgeSubCategory extends Model
{
    protected $fillable = [
        'event_category_id', 'event_sub_category_id',
    ];
    public function getEventCategory()
    {
        return $this->belongsTo('App\EventCategory', 'event_category_id');
    }

    public function getEventSubCategory()
    {
        return $this->belongsTo('App\EventSubCategory', 'event_sub_category_id');
    }
}
