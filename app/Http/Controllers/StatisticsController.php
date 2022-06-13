<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Models\Hours;

class StatisticsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getStatistics(Request $request)
    {
        if($request->input('from_date') != null || $request->input('to_date') != null) {
            $toDate = $request->input('to_date');
            $totalHours = 0;

            $request->validate([
                'from_date' => 'required|date'
            ]);

            if ($toDate == null) $toDate = Carbon::now()->format('Y-m-d');

            $hours = Hours::where('clock_in', '>', $request->input('from_date'))
                ->where('clock_out', '<', Carbon::parse($toDate)->addDay()->format('Y-m-d'))
                ->where('user_id', \Auth::user()->id)
                ->get();

            $hoursController = new HoursController;
            $hours = $hoursController->breakCompensationRaw($hours);
            foreach ($hours as $hour) $totalHours += $hour->hourCount;

            return view('statistics')->with([
                'hours' => $hours,
                'totalHours' => $totalHours,
                'oldFromDate' => $request->input('from_date'),
                'oldToDate' => $toDate
            ]);
        }

         return view('statistics');
    }
}
