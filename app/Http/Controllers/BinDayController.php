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
        $bindays = Binday::where('date', '>=', $date)->take(4)->get();
        $bindays->each(function ($binday) {
            $binday->datef = $binday->date->format('l j F');
            $binday->eod = $binday->date->setTime(19, 0);//collection day past at 7pm
            $binday->past = $binday->eod->isPast();
        });
        return $bindays;
    }
}
