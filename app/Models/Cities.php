<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    protected $table = "cities";
    protected $fillable = ["name"];

    public function city()
    {
        return $this->hasOne(cityTemperatures::class, 'city_id', 'id');
    }

    public function cityForecast()
    {
        return $this->hasOne(Forecast::class, 'city_id', 'id');
    }
}
