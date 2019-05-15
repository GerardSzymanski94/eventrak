<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $fillable = ['user_id', 'nip', 'regon', 'regon14', 'name', 'province', 'district', 'community', 'city',
        'zipCode', 'street', 'province_2', 'district_2', 'community_2', 'city_2', 'zipCode_2',
        'street_2', 'type', 'silo'];
}
