<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     */
    public function getJWTCustomClaims()
    {
        return [];
    }


    public function getImageAttribute($value)
    {
        return $this->attributes['is_able_to_login'] ? url('/') . '/' . $value : $value;
    }

    public function ratings()
    {
        return $this->hasMany('App\Review', 'review_by');
    }

    public function studyData()
    {
        return $this->hasMany('App\StudyData', 'published_to');
    }

    public function professors()
    {
        return $this->hasMany('App\Professor', 'professor_user_id');
    }

    public function students()
    {
        return $this->hasMany('App\Student', 'student_user_id');
    }

    public function getNameAttribute($value)
    {
        return preg_replace('/\s+/', ' ', $value);
    }

    public function hasVerifiedEmail()
    {
        return $this->email_verified_at != null && $this->verification_code == null;
    }
}
