<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subservice extends Model
{
    protected $table = 'subservices';

    public function services()
    {
        return $this->belongsToMany('App\Service', 'subservice_service', 'subservice_id', 'service_id');
    }
}