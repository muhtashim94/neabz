<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Countrie extends Model
{
    protected $table = 'countries';
    protected $primaryKey = "id";

    protected $fillable = [
        'code',
        'name',
        'phonecode',
        'status',
    ];

    public function states()
    {
        return $this->hasMany('App\State', 'country_id');
    }
}
