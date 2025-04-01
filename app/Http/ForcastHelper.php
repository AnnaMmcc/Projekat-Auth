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
}
