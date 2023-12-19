<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Meeting;

class MeetingController extends Controller
{
    public function upcoming()
    {
        $date = Carbon::now();
        $date->subMonth();
        $meetings = Meeting::where('date', '>=', $date)->take(8)->get();
        $meetings->each(function ($meeting) {
            $meeting->datef = $meeting->date->format('l j F Y \a\t g:ia');
            $meeting->eod = $meeting->date->setTime(23, 0);//meeting over at 11pm
            $meeting->past = $meeting->eod->isPast();
        });
        return $meetings;
    }
}
