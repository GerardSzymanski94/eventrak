<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['user_id', 'photo_type_id', 'rating', 'name'];

    public function photoType()
    {
        return hasOne(PhotoType::class);
    }
}
