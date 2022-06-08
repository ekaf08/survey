<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

if (!function_exists('getDateAndTime')) {
    function getDateAndTime()
    {
        $dt = Carbon::now(env('APP_TZ'));
        $date = $dt->isoFormat('dddd, Do MMMM YYYY');
        $time = $dt->isoformat('H:mm');
        return [$date, $time];
    }
}

if (!function_exists('parseDate')) {
    function parseDate($time, $isoFormat = True)
    {
        if ($isoFormat) {
            return $time->isoFormat('dddd, Do MMMM YYYY');
        } else {
            return $time->format('%Y%m%d%H%M%s');
        }
    }
}

if (!function_exists('parseTime')) {
    function parseTime($time, $isoFormat = True)
    {
        if ($isoFormat) {
            return $time->isoFormat('H:mm');
        } else {
            return $time->format('%H%M%s');
        }
    }
}

if (!function_exists('rjust')) {
    function rjust($string, $length, $char = "0")
    {
        return str_pad($string, $length, $char, STR_PAD_LEFT);
    }
}

if (!function_exists('checkRole')) {
    function checkRole(...$roles)
    {
        $access = auth()->user()->access;
        if (!(in_array($access->alias, $roles)) && !(in_array($access->level, $roles))) {
            return false;
        }
        return true;
    }
}

if (!function_exists('setPrefixActive')) {
    function setPrefixActive($key, $output = 'active')
    {
        $uri = Request::path();
        $array_uri = explode("/", $uri);
        if ($array_uri[0] == $key) {
            return $output;
        }
    }
}

if (!function_exists('setActive')) {
    function setActive($uri, $output = 'active')
    {
        if (is_array($uri)) {
            foreach ($uri as $u) {
                if (Route::is($u)) {
                    return $output;
                }
            }
        } else {
            if (Route::is($uri)) {
                return $output;
            }
        }
    }
}
