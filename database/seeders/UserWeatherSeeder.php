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
        }

        $temperature = $this->command->getOutput()->ask("Unesite temperaturu");

        if($temperature == null)
        {
            $this->command->getOutput()->error("Niste uneli temperatutu!");
        }

        cityTemperatures::create([
            'city' =>   $city,
            'temperatures' => $temperature
        ]);

        $this->command->getOutput()->info("Uspesno ste uneli grad $city sa temperaturom od $temperature stepeni");
    }
}
