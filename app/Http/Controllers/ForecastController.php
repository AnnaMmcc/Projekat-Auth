<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Forecast;
use Illuminate\Http\Request;

class ForecastController extends Controller
{
    public function index(Cities $city)
    {

        return view('/forecast', compact('city'));
    }

    public function forecastUpdate (Cities $city)
    {
       return view('admin/forecasts', compact('city'));
    }
    public function searchCity(Request $request)
    {
        $cityName = $request->get("city");

        $cities = Cities::where("name", "LIKE", "%$cityName%")->get();

        if(count($cities) == 0)
      {
          return redirect()->back()->with("error", "Nismo pronasli gradove koji su za vase kriterijume");
      }

        return view("search_results", compact("cities"));
    }
    public function searchPermalink(Request $request, $city)
    {
       $city = Cities::all();

        return view("search_permalink", compact('city'));
    }

}
