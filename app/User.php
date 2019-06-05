<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'admin', 'nip', 'phone', 'status'
    ];

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

    public function userInfo()
    {
        return $this->hasOne(UserInfo::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function getPoints()
    {
        $photos = $this->photos;
        $points = 0;
        foreach ($photos as $photo) {
            if (isset($photo->rating))
                $points += $photo->rating;
        }
        return $points;
    }

    public function getStatus()
    {
        $status = $this->status;
        switch ($status) {
            case(0):
            case(1):
                return "<span style='color:red'>niedokończony</span>";
                break;
            case (2):
                return "<span style='color:yellow'>dokończone - nieocenione</span>";
                break;
            case(3):
                return "<span style='color:green'>zgłoszenie ocenione</span>";
                break;
        }
        return 'niedokończony';
    }
}
