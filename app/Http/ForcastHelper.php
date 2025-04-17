<?php

namespace App\Http;

class ForcastHelper
{
    public static function getColorByTemperature($temperature)
    {

        if($temperature <= 0)
        {
            $boja = "lighyblue";
        }
        else if($temperature >= 1 && $temperature <= 15)
        {
            $boja = "blue";
        }
        else if($temperature > 15 && $temperature <=25)
        {
            $boja = "green";
        }
        else {
            $boja = "red";
        }
        return $boja;

    }

    const WEATHER_ICONS = [
        "rainy" => "fa-cloud-rain",
        "snowy" => "fa-snowflake",
        "sunny" => "fa-sun",
        "cloudy" => "fa-cloud"
    ];

    public static function getIconByWeatherType($weather_type)
    {
//        if(in_array($weather_type, self::WEATHER_ICONS))
//        {
//            return self::WEATHER_ICONS[$weather_type];
//        }

       // return "fa-sun";

        $icon = match ($weather_type) {
            "rainy" => "fa-cloud-rain",
            "snowy" => "fa-snowflake",
            "sunny" => "fa-sun",
            "cloudy" => "fa-cloud",
            default => "fa-sun"
        };
        return $icon;

    }

}
