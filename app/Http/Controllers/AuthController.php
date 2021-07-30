<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
	public function getLogin()
	{
		if(Auth::user()) return redirect()->route('home');

		return view('auth.login');
	}

	public function getForgot()
	{
		if(Auth::user()) return redirect()->route('home');

		return view('auth.forgot');
	}

	public function getRegister()
	{
		if(Auth::user()) return redirect()->route('home');

		return view('auth.register');
	}

	public function postUser(Request $request)
	{
		$validator = $request->validate([
			'firstname' => 'required|max:100',
			'lastname' => 'required|max:100',
			'email' => 'required|email|unique:users',
			'password' => ['required', Password::min(6)->mixedCase()->numbers(), 'confirmed'],
		]);

		$user = new User;
		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = Hash::make($request->password);
		$user->save();

		Auth::login($user);

		return response()->json([
			$user
		]);
	}
}