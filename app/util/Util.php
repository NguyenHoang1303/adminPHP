<?php

namespace App\util;

use Illuminate\Support\Facades\Blade;

class Util
{
    static $usdToVnd = 24000;

    public static function formatPriceToVnd($price): string{
        return number_format($price, 0, ',', ' ');
    }

    public static function convertVndToUsd($price)
    {
        return round($price/Util::$usdToVnd,2);
    }
}
