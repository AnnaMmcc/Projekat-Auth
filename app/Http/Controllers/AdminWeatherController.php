<?php

namespace App\Http\Controllers;

use App\Models\cityTemperatures;
use App\Models\Forecast;
use Illuminate\Http\Request;

class AdminWeatherController extends Controller
{
    public function update(Request $request)
    {
     $request->validate([
         "temperatures" => "required",
         "city_id" => "required|exists:cities,id"
     ]);

     $weather = cityTemperatures::where(['city_id' => $request->get("city_id")])->first();
     $weather->temperatures = $request->get("temperatures");
     $weather->save();

     return redirect()->back();

    }

}
