<?php

namespace Database\Seeders;

use App\Models\Cities;
use App\Models\Forecast;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ForecastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = Cities::all();

        foreach ($cities as $city) {

            for ($i = 0; $i < 5; $i++)
            {
                $weatherType = Forecast::WEATHERS[rand(0 , 2)];

                $probability = null;

                if($weatherType == "rainy" || $weatherType == "snowy")
                {
                    $probability = rand(1, 100);
                }

                Forecast::create([
                    'city_id' => $city->id,
                    'temperature' => rand(15, 30),
                    'date' => Carbon::now()->addDays(rand(1,30)),
                    'weather_type' => $weatherType,
                    'probability' => $probability
                ]);
            }

        }
    }
}
