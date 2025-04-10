<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\Forecast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $cities = Cities::with('toDayForecast')->where("name", "LIKE", "%$cityName%")->get();

        if(count($cities) == 0)
      {
          return redirect()->back()->with("error", "Nismo pronasli gradove koji su za vase kriterijume");
      }

        $userFavourites = [];
       if(Auth::check())
       {
         $userFavourites = Auth::user()->cityFavourites;
         $userFavourites = $userFavourites->pluck('city_id')->toArray();
       }

     return view("search_results", compact("cities", "userFavourites"));
    }
    public function searchPermalink(Request $request,Cities $city)
    {
        $citiess = Cities::with('forecast')->get();

        return view("search_permalink", compact('city', 'citiess'));
    }

}
