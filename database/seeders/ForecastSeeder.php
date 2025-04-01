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

            for ($i = 0; $i < 5; $i++)
            {
                $weather_type = Forecast::WEATHERS[rand(0 , 3)];

                $probability = null;

                if($weather_type == "rainy" || $weather_type == "snowy" || $weather_type == "cloudy")
                {
                    $probability = rand(1, 100);
                }

                Forecast::create([
                    'city_id' => $city->id,
                    'temperature' => rand(15, 30),
                    'date' => Carbon::now()->addDays(rand(1,30)),
                    'weather_type' => $weather_type,
                    'probability' => $probability
                ]);
            }

        }
    }
}
