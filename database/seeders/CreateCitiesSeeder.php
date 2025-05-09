<?php

namespace Database\Seeders;

use App\Models\Cities;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CreateCitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $amount = $this->command->getOutput()->ask("Koliko gradova zelite da upisete?" , 100);

        $faker = Factory::create();


        $this->command->getOutput()->progressStart($amount);

        for ($i = 0; $i < $amount; $i++) {

        Cities::create([
            "name" => $faker->city
        ]);

            $this->command->getOutput()->progressAdvance();

        }


        $this->command->getOutput()->progressFinish();
    }
}
