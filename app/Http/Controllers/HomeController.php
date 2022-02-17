<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth', 'clockStatus']);
	}

	public function getHome()
	{
		return view('home');
	}
}
