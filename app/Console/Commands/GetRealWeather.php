<?php

namespace App\Console\Commands;

use App\Models\Cities;
use App\Models\Forecast;
use App\Services\WeatherService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetRealWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-real-weather {city}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $city = $this->argument('city');

       $dbCity = Cities::where(['name' => $city ])->first();

       if($dbCity === null)
       {
           $dbCity = Cities::create([
               'name' => $city
           ]);

       }


        //https://api.weatherapi.com/v1/current.json

        $weatherService = new WeatherService();
       $jsonResponse = $weatherService->getForecast($city);

        if(isset($jsonResponse['error']))
        {
            $this->output->error($jsonResponse['error']['message']);

        }
        if($dbCity->toDayForecast !== null)
        {
            $this->output->info("Command finished");
            return;
        }

        $forecastday = $jsonResponse["forecast"]["forecastday"][0];

       $date = $forecastday["date"];

        $temperature = $forecastday["day"]["avgtemp_c"];

        $weather_type =$forecastday["day"]["condition"]["text"];

        $probability = $forecastday["day"]["daily_chance_of_rain"];


        $forecast = [
            "city_id" => $dbCity->id,
            "date" => $date,
            "temperature" => $temperature,
            "weather_type" => strtolower($weather_type),
            "probability" => $probability
        ];

      Forecast::create($forecast);

      $this->output->info("Added new today's forecast");

    }
}
