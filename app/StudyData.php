<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudyData extends Model
{
    protected $guarded = [];


    public function getDocumentAttribute($value)
    {
        return  url('/') . '/' . $value;
    }

    public function getCreatedAtAttribute($date)
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }
}
