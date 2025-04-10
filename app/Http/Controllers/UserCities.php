<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCities extends Controller
{
    public function favourite(Request $request, $city)
    {
        $user = Auth::user();
        if($user === null)
        {
            return redirect()->back()->with(['error' => "Morate biti ulogovani da biste dodali grad u 'Favourites' :"]);
        }

        \App\Models\UserCities::create([
            'city_id' => $city,
            'user_id' => $user->id
        ]);
        return redirect()->back();
    }
 public function unfavourite($city)
 {
     $user = Auth::user();
     if($user === null)
     {
         return redirect()->back()->with(['error' => "Morate biti ulogovani da biste obrisali grad iz 'Favourites' :"]);
     }

     $unfavouriteCity = \App\Models\UserCities::where([
         'city_id' => $city,
         'user_id' => $user->id
     ])->first();

     $unfavouriteCity->delete();

     return redirect()->back();
 }

}
