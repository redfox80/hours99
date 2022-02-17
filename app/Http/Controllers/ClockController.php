<?php

namespace App\Http\Controllers;

use App\Models\Hours;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ClockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function clockIn():RedirectResponse
    {
        $user = Auth::user();

        $lastEntry = Hours::where('user_id', $user->id)->orderBy('id', 'desc')->first();
        if($lastEntry)
        {
            if($lastEntry->clock_out == null)
            {
                return back()->with('allreadyClockedIn', true);
            }
        }

        $clockEntry = new Hours;
        $clockEntry->clock_in = Carbon::now();
        $clockEntry->user_id = $user->id;
        $clockEntry->save();

        return back()->with('clockedIn', true);
    }

    public function clockOut():RedirectResponse
    {
        $user = Auth::user();

        $lastEntry = Hours::where('user_id', $user->id)->orderBy('id', 'desc')->first();
        if($lastEntry->clock_out != null)
        {
            return back()->with('allreadyClockedOut', true);
        }

        $lastEntry->clock_out = Carbon::now();
        $lastEntry->save();

        return back()->with('clockedOut', true);
    }
}
