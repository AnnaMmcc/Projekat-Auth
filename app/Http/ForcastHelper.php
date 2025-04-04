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
    public static function getIconByWeatherType($weather_type)
    {
        if($weather_type == "rainy")
        {
            $icon = "fa-cloud-rain";
        }
        else if ($weather_type == "snowy")
        {
            $icon = "fa-snowflake";
        }
        else if($weather_type == "sunny")
        {
            $icon = "fa-sun";
        }
        else if ($weather_type == "cloudy")
        {
            $icon = "fa-cloud";
        }
        return $icon;
    }

}
