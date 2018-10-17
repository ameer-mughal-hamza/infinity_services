<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function subservices()
    {
        return $this->belongsToMany('App\Subservice', 'subservice_service', 'service_id', 'subservice_id');
    }
}
