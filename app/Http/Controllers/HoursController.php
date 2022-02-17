<?php

namespace App\Http\Controllers;

use App\Models\Hours;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class HoursController extends Controller
{
    public function breakCompensationRaw($hours)
    {
        $settings = Auth::user()->settings;

        foreach($hours as $hour)
        {
            $hc = Carbon::parse($hour->clock_in)->floatDiffInHours(Carbon::parse($hour->clock_out));
            if($hc >= $settings->hoursBeforeSubtract) $hc = $hc - $settings->hoursToSubtract;
            $hour->hourCount = $hc;
        }

        return $hours;
    }
    public function breakCompensation($hours)
    {
        $settings = Auth::user()->settings;

        foreach($hours as $hour)
        {
            $hc = Carbon::parse($hour->clock_in)->floatDiffInHours(Carbon::parse($hour->clock_out));
            if($hc >= $settings->hoursBeforeSubtract) $hc = $hc - $settings->hoursToSubtract;
            $hm = floor(($hc - floor($hc)) * 60);
            $hour->hourCount = floor($hc) . ' Hours ' . $hm . ' Minutes';
        }

        return $hours;
    }

    public function getHoursView():view
    {
        $hours = Hours::where('user_id', Auth::user()->id)->orderBy('clock_in', 'desc')->get();
        $hours = $this->breakCompensation($hours);

        return view('hours.list')
            ->with([
                'hours' => $hours
            ]);
    }

    public function getHour($id):view
    {
        $hour = Hours::findOrFail($id);


        return view('hours.edit')
            ->with([
                'hour' => $hour
            ]);
    }

    public function updateHour($id, Request $request):RedirectResponse
    {
        $request->validate([
           'clock_in' => 'required|date'
        ]);

        $hour = Hours::findOrFail($id);
        $hour->clock_in = Carbon::parse($request->input('clock_in'))->toDateTimeString();
        $hour->clock_out = Carbon::parse($request->input('clock_out'))->toDateTimeString();
        $hour->save();

        Session::flash('toasts', [
            [
                'title' => 'Updated',
                'body' => 'Successfully updated',
                'color' => 'success',
            ]
        ]);
        return redirect()->route('editHour', $hour->id);
    }

    public function getAdd():View
    {
        if(Session::get('clockStatus') == true)
        {
            Session::flash('toasts', [
               [
                   'title' => 'Beware',
                   'color' => 'warning',
                   'body' => "You are allready clocked in. This is not a problem, just a reminder",
                   'nohide' => true
               ]
            ]);
        }

        return view('hours.add');
    }

    public function postAdd(Request $request):RedirectResponse
    {
        $request->validate([
            'clock_in' => 'required',
            'clock_out' => 'required'
        ]);

        $hour = new Hours;

        $hour->user_id = Auth::user()->id;
        $hour->clock_in = $request->input('clock_in');
        $hour->clock_out = $request->input('clock_out');
        $hour->save();

        Session::flash('toasts', [
            [
                'title' => 'Created',
                'body' => 'Successfully created entry',
                'color' => 'success',
            ]
        ]);

        if($request->input('anotherone') == true) return redirect()->back();
        return redirect(route('editHour', $hour->id));
    }

    public function postDelete(Request $request):RedirectResponse
    {
        $request->validate([
            'hid' => 'required|integer'
        ]);

        $hour = Hours::findOrFail($request->input('hid'));
        $hour->delete();

        return redirect(route('hours'))->with([
            'deleted' => true
        ]);
    }
}
