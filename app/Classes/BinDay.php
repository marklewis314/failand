<?php

namespace App\Classes;

use Carbon\Carbon;

class BinDay {
    public $date;
    public $type;
    
    public static function upcoming() {
        $date = Carbon::now();
        $date->previous(Carbon::TUESDAY);
        $date->setTime(19, 0);//7pm
        for ($i = 0; $i < 4; $i++) {
            $binDay = new BinDay;
            $binDay->date = clone $date;
            $week = $date->weekOfYear;
            $odd = $week % 2;
            $binDay->type = $odd ? 'green' : 'black';
            $binDays[] = $binDay;
            $date->addWeek(); 
        }
        return $binDays;
    }

}
