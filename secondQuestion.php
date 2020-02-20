<?php
// get time and returm minutes after hour

function getMinute($time) {

    if ($time < 3600) {

        $minute = intdiv($time, 60);
        $second = $time - ($minute * 60);
        echo "Здесь нет полного часа, только $minute мин и $second сек.";

    }elseif($time >= 3600) {

        $hours = intdiv($time, 3600);
        $seconds = $time - ($hours * 3600);
        $minutes = intdiv($seconds, 60);
        $second = $time - (($hours * 3600) + ($minutes * 60));
        echo "Прошло $minutes минут и $second секунд после последнего часа";

    }elseif($time <= 0) {

        echo "Это ошибка!";
    }

}

$time = 3601;
getMinute($time);