<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bookings extends Model
{
    protected $fillable = [
        '__pk',
        '_fk_property',
        'start_date',
        'end_date'
    ];
}
