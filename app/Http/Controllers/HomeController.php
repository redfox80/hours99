<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Hours;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth', 'clockStatus']);
	}

	public function getHome()
	{
        $hours = Hours::where('user_id', Auth::user()->id)->get();
        $hoursMonth = Hours::where('user_id', Auth::user()->id)->where('clock_in', '>=', Carbon::now()->startOfMonth())->get();
        $hoursWeek = Hours::where('user_id', Auth::user()->id)->where('clock_in', '>=', Carbon::now()->startOfWeek())->get();
        $hours      = (new HoursController)->breakCompensationRaw($hours);
        $hoursMonth = (new HoursController)->breakCompensationRaw($hoursMonth);
        $hoursWeek  = (new HoursController)->breakCompensationRaw($hoursWeek);
        $hoursCountTotal = 0;
        $hoursCountMonth = 0;
        $hoursCountWeek = 0;

        foreach($hours as $hour) $hoursCountTotal += $hour->hourCount;
        foreach($hoursMonth as $hour) $hoursCountMonth += $hour->hourCount;
        foreach($hoursWeek as $hour) $hoursCountWeek += $hour->hourCount;

		return view('home')->with([
            'totalHours' => floor($hoursCountTotal),
            'totalHoursMonth' => floor($hoursCountMonth),
            'totalHoursWeek' => floor($hoursCountWeek),
        ]);
	}
}
