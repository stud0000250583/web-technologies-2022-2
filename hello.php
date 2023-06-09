<?php
date_default_timezone_set('Asia/Yekaterinburg');
$title = "<title>Hello, world</title>";
$header = "<h1>Первый PHP проект</h1>";

function get_current_hour()
{
    $currentHour = date("G");
    if ($currentHour >= 5 && $currentHour <= 20 || $currentHour == 0)
        return $currentHour . " часов";
    elseif ($currentHour == 1 || $currentHour == 21)
        return $currentHour . " час";
    else
        return $currentHour . " часа";
}

function get_current_minute()
{
    $currentMinute = date("i");
    if ($currentMinute >= 5 && $currentMinute <= 19)
        return $currentMinute . " минут";
    else {
        $remainder = $currentMinute % 10;
        if ($remainder == 0 || $remainder >= 5)
            return $currentMinute . " минут";
        elseif ($remainder == 1)
            return $currentMinute . " минута";
        else
            return $currentMinute . " минуты";
    }
}

function get_current_time()
{
    return get_current_hour() . " " . get_current_minute();
}

function get_current_date()
{
    return $currentYear = date("m.d.Y г.");
}
?>