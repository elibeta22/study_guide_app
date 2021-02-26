<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $guarded = [];
    //


    public function getStateAttribute($state)
    {
        return ucwords($state);
    }
}
