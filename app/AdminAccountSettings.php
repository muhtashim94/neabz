<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminAccountSettings extends Model
{
    public function getCountry()
    {
        return $this->belongsTo('App\Countrie', 'country');
    }

    public function getState()
    {
        return $this->belongsTo('App\State', 'state');
    }
}
