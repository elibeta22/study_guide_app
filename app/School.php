<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $guarded = [];


    public function professors()
    {
        return $this->hasMany('App\Professor', 'school_id');
    }
    public function students()
    {
        return $this->hasMany('App\Student', 'school_id');
    }

}
