<?php

namespace App\Http\Controllers;

use App\Models\Forecast;
use Illuminate\Http\Request;

class AdminForecastController extends Controller
{
    public function saveCreate(Request $request)
    {
        $request->validate([
            "city_id" => "required|exists:cities,id",
            "temperatures" => "required",
            "weather_type" => "required",
            "date" => "required",
        ]);

        Forecast::create([
            "city_id" => $request->get("city_id"),
            "temperature" => $request->get("temperatures"),
            "probability" => $request->get("probability"),
            "weather_type" => $request->get("weather_type"),
            "date" => $request->get("date")
        ]);

        return redirect()->back();
    }
}
