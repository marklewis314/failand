<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\BinDay;

class BinDayController extends Controller
{
    public function upcoming()
    {
        $date = Carbon::now();
        $date->subWeek();
        $bindays = Binday::where('date', '>=', $date)->take(8)->get();
        $bindays->each(function ($binday) {
            $binday->day = $binday->date->format('l');
            $binday->datef = $binday->date->format('j F');
            $binday->eod = $binday->date->setTime(19, 0);//collection day past at 7pm
            $binday->past = $binday->eod->isPast();
        });
        return $bindays;
    }
}
