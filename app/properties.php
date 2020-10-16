<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class properties extends Model
{
    protected $fillable = [
        '__pk',
            '_fk_location',
            'property_name',
           'near_beach',
           'accepts_pets',
            'sleeps',
            'beds'
    ];
}
