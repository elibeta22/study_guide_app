<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $guarded = [];
    protected $hidden = ['pivot'];

    public function professors()
    {
        return $this->hasMany('App\Professor', 'department_id');
    }
}
