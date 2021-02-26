<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $guarded = [];
    //

    public function users(){
        return $this->belongsTo('App\User', 'review_by');
    }

    public function ratings()
    {
        return $this->belongsTo('App\Professor', 'review_for');
    }
}
