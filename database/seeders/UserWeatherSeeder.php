<?php

namespace Database\Seeders;

use App\Models\Cities;
use App\Models\cityTemperatures;
use Illuminate\Database\Seeder;

class UserWeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = Cities::all();

        foreach ($cities as $city)
        {
          $userWeather = cityTemperatures::where(['city_id' => $city->id])->first();
          if($userWeather !== null)
          {
              $this->command->getOutput()->error('Ovaj grad vec postoji');
              continue;
          }
            cityTemperatures::create([
                'city_id' => $city->id,
                'temperatures' => rand(15,30)
            ]);
        }


    }
}
