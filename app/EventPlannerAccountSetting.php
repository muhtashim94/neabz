<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventPlannerAccountSetting extends Model
{
    public function getCountry()
    {
        return $this->belongsTo('App\Countrie', 'home_address_country');
    }

    public function getState()
    {
        return $this->belongsTo('App\State', 'home_address_state');
    }

    public function getBillingCountry()
    {
        return $this->belongsTo('App\Countrie', 'billing_address_country');
    }

    public function getBillingState()
    {
        return $this->belongsTo('App\State', 'billing_address_state');
    }

    public function getShippingCountry()
    {
        return $this->belongsTo('App\Countrie', 'shipping_address_country');
    }

    public function getShippingState()
    {
        return $this->belongsTo('App\State', 'shipping_address_state');
    }

    public function getWorkCountry()
    {
        return $this->belongsTo('App\Countrie', 'work_address_country');
    }

    public function getWorkState()
    {
        return $this->belongsTo('App\State', 'work_address_state');
    }
}
