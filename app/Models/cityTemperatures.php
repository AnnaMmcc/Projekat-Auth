<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cityTemperatures extends Model
{
    protected $table = 'city_temperatures';
    protected $fillable = [
        'city_id',
        'temperatures',
    ];

    public function city()
    {
        return $this->hasOne(Cities::class, 'id', 'city_id');
    }
}
