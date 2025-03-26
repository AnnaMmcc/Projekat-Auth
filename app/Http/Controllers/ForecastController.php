<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Forecast;
use GuzzleHttp\Psr7\Request;

class ForecastController extends Controller
{
    public function index(Cities $city)
    {

        return view('/forecast', compact('city'));
    }
}
