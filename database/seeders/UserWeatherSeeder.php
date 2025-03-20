<?php

namespace Database\Seeders;

use App\Models\cityTemperatures;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserWeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $city_id = $this->command->getOutput()->ask("Unesite id grada");
        if($city_id == null)
        {
            $this->command->getOutput()->error("Niste uneli id grada!");
            return;
        }
        $city_id = cityTemperatures::where(['city_id' => $city_id])->first();

        $temperature = $this->command->getOutput()->ask("Unesite temperaturu");

        if($temperature == null)
        {
            $this->command->getOutput()->error("Niste uneli temperatutu!");
            return;
        }

        cityTemperatures::create([
            'city_id' =>   $city_id,
            'temperatures' => $temperature
        ]);

        $this->command->getOutput()->info("Uspesno ste uneli id $city_id sa temperaturom od $temperature stepeni");
    }
}
