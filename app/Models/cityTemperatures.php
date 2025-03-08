<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cityTemperatures extends Model
{
    protected $table = 'city_temperatures';
    protected $fillable = [
        'city',
        'temperatures',
    ];
}
