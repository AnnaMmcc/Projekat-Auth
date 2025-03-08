<?php

namespace App\Http\Controllers;

use App\Models\cityTemperatures;
use Illuminate\Http\Request;

class temperatureCity extends Controller
{
    public function cityTemperatures()
    {
     $allTemperatures = cityTemperatures::all();
     return view('city-temperatures', compact('allTemperatures'));
    }
}
