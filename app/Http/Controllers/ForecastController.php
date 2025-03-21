<?php

namespace App\Http\Controllers;

class ForecastController extends Controller
{
    public function index($city)
    {
        $forecast = [
            "beograd" => [22, 23, 24, 25, 23],
            "sarajevo" => [20, 23, 23, 22, 12]
        ];
        $city = strtolower($city);
        if (!array_key_exists($city, $forecast)) {
            die("Ovaj grad ne postoji");
        }
    }
}
