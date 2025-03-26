<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Forecast;
use GuzzleHttp\Psr7\Request;

class ForecastController extends Controller
{
    public function index(Cities $city)
    {
       $prognoza = Forecast::where(['city_id' => $city->id])->get();

        return view('/forecast', compact('prognoza'));
    }
}
