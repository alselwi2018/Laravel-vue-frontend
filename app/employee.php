<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
   protected $fillable = ['__pk',
   '_fk_department',
    'first_name',
    'last_name',
    'age'
];
}
