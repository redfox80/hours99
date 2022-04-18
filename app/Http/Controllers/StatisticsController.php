<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hours;

class StatisticsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getStatistics()
    {
        return view('statistics');
    }

    public function postStatistics(Request $request)
    {
        $totalHours = 0;

        $hours = Hours::where('clock_in', '>', $request->input('start_date'))
            ->where('clock_out', '<', $request->input('end_date'))
            ->get();

        $hoursController = new HoursController;
        $hours = $hoursController->breakCompensationRaw($hours);

//        dd($hours);

        foreach($hours as $hour)
        {
            $totalHours += $hour->hourCount;
        }

        return view('statistics')->with([
            'hours' => $hours,
            'totalHours' => $totalHours
        ]);
    }
}
