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

    public function addInDatabase(Request $request)
    {
    $request->validate([
        "city" => "required|string|min:3",
        "temperatures" => "required",
    ]);
    cityTemperatures::create([
        "city" => $request->get("city"),
        "temperatures" => $request->get("temperatures"),
    ]);
    return redirect("/city-temperature");
    }

    public function changeTemperatures()
    {
        $allTemperatures = cityTemperatures::all();
        return view('/change-temperature', compact('allTemperatures'));
    }

    public function edit(Request $request, $id)
    {

        $singleTemperature = cityTemperatures::where(['id' => $id])->first();

        if($singleTemperature == null)
        {
            die("Nepostojeci id");
        }

        return view("/edit-temperature", compact('singleTemperature'));
    }
    public function saveEdit(Request $request, $id)
    {
    $singleTemperature = cityTemperatures::where(['id' => $id])->first();

    if($singleTemperature == null)
    {
        die("Nepostojeci id");
    }

    $singleTemperature->city = $request->get("city");
    $singleTemperature->temperatures = $request->get("temperatures");

    $singleTemperature->save();

    return redirect()->back();

    }

    public function delete(Request $request, $id)
    {
        $singleTemperature = cityTemperatures::where(['id' => $id])->first();

        if($singleTemperature == null)
        {
            die("Nepostojeci id");
        }
        $singleTemperature->delete();

        return redirect()->back();
    }
}
