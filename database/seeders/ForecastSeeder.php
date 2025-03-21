<?php

namespace Database\Seeders;

use App\Models\Cities;
use App\Models\Forecast;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                Forecast::create([
                    'city_id' => $city->id,
                    'temperature' => rand(15, 30),
                    'date' => Carbon::now()->addDays(rand(1,30))
                ]);
            }

        }
    }
}
