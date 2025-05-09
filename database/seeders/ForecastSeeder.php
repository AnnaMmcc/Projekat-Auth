<?php

namespace Database\Seeders;

use App\Http\ForcastHelper;
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

            $firstTemperature = null;


            for ($i = 0; $i < 30; $i++)
            {
                $weather_type = Forecast::WEATHERS[rand(0 , 3)];

                $probability = null;

                if($weather_type == "rainy" || $weather_type == "snowy" || $weather_type == "cloudy")
                {
                    $probability = rand(1, 100);
                }
                $temperature = null;

                if($firstTemperature != null)
                {
                    $minTemperature = $firstTemperature-5;
                    $maxTemperature = $firstTemperature+5;
                    $temperature = rand($minTemperature, $maxTemperature);
                }
                else
                {
                    switch ($weather_type)
                    {
                        case "sunny":
                            $temperature = rand(-50, 50);
                            break;
                        case "snowy":
                            $temperature = rand(-50,1);
                            break;
                        case "cloudy":
                            $temperature = rand(-50, 15);
                            break;
                        case "rainy":
                            $temperature = rand(-10,50);
                            break;
                    }
                }

                Forecast::create([
                    'city_id' => $city->id,
                    'temperature' => $temperature,
                    'date' => Carbon::now()->addDays($i),
                    'weather_type' => $weather_type,
                    'probability' => $probability
                ]);

                $firstTemperature = $temperature;
            }

        }
    }
}
