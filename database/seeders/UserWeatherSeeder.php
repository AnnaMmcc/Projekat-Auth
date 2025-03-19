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
        $city = $this->command->getOutput()->ask("Unesite ime grada");
        if($city == null)
        {
            $this->command->getOutput()->error("Niste uneli ime grada!");
            return;
        }
        $city = cityTemperatures::where(['city' => $city])->first();
        if($city instanceof cityTemperatures)
        {
            $this->command->getOutput()->error("Vec postoji ime grada");
            return;
        }

        $temperature = $this->command->getOutput()->ask("Unesite temperaturu");

        if($temperature == null)
        {
            $this->command->getOutput()->error("Niste uneli temperatutu!");
            return;
        }

        cityTemperatures::create([
            'city' =>   $city,
            'temperatures' => $temperature
        ]);

        $this->command->getOutput()->info("Uspesno ste uneli grad $city sa temperaturom od $temperature stepeni");
    }
}
