<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
	public function getLogin()
	{
		if(Auth::check()) return redirect()->route('home');

		return view('auth.login');
	}

	public function getForgot()
	{
		if(Auth::check()) return redirect()->route('home');

		return view('auth.forgot');
	}

	public function getRegister()
	{
		if(Auth::check()) return redirect()->route('home');

		return view('auth.register');
	}

	public function postLogin(Request $request)
	{
		if(Auth::check()) return rediredct()->route('home');

		$credentials = $request->validate([
			'email' => 'required|email',
			'password' => 'required'
		]);

		//Check if remember me box is checked, if so, then true.
		$rememberMe = ($request->remember_me == "on");

		if(Auth::attempt($credentials, $rememberMe))
		{
			//Regenerate session id for security reasons?
			$request->session()->regenerate();

			return redirect()->intended('home');
		}

		return back()->withInput()->withErrors([
			'email' => 'The provided credentials did not match our records',
            'password' => 'What?'
		]);
	}

	public function getLogout()
	{
		Auth::logout();
		return redirect()->route('login');
	}

	public function postRegister(Request $request)
	{
		if(Auth::check()) return rediredct()->route('home');

		$validator = $request->validate([
			'firstname' => 'required|max:100',
			'lastname' => 'required|max:100',
			'email' => 'required|email|unique:users',
			'password' => ['required', Password::min(6)->mixedCase()->numbers(), 'confirmed'],
		]);

		$user = new User;
		$user->firstname = $request->firstname;
		$user->lastname = $request->lastname;
		$user->email = $request->email;
		$user->password = Hash::make($request->password);
		$user->save();

        $settings = new Settings;
        $settings->uid = $user->id;
        $settings->save();

		Auth::login($user);

		//Regenerate session id for security reasons?
		$request->session()->regenerate();

		return redirect()->intended('home');
	}
}
