<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Password;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getSettings()
    {
        return view('settings');
    }

    public function updateUserInfo(Request $request)
    {
        $request->validate([
            'firstname' => 'required|alpha',
            'lastname' => 'required|alpha'
        ]);

        $user = Auth::user();

        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->save();

        Session::flash('toasts', [
            [
                'title' => 'Updated',
                'body' => 'User info was sucessfully updated',
                'color' => 'success'
            ]
        ]);

        return redirect()->back();
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password_old' => 'current_password:web',
            'password' => [Password::min(8)->letters()->mixedCase()->numbers(), 'different:password_old'],
            'password_confirm' => 'same:password'
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();

        Session::flash('toasts', [
            [
                'title' => 'Password Changed',
                'body' => 'Your password was changed successfully',
                'color' => 'success'
            ]
        ]);

        return redirect()->back();
    }

    public function updateTimeSettings(Request $request)
    {
        $request->validate([
            'hoursBeforeSubtract' => 'required|numeric',
            'hoursAmountToSubtract' => 'required|numeric'
        ]);

        $settings = Settings::where('uid', Auth::user()->id)->first();
        $settings->hoursBeforeSubtract = $request->input('hoursBeforeSubtract');
        $settings->hoursToSubtract = $request->input('hoursAmountToSubtract');
        $settings->save();

        Session::flash('toasts', [
            [
                'title' => 'Success',
                'body' => 'Your time settings was updated successfully',
                'color' => 'success'
            ]
        ]);

        return redirect()->back();
    }
}
