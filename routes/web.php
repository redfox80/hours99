<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
	return redirect()->route('login');
});

// Route::get('login', function() {
// 	return view('auth.login');
// })->name('login');

Route::group(['namespace' => 'App\Http\Controllers'], function() {

	Route::get('home', 'HomeController@getHome')->name('home');


	Route::get('login', 'AuthController@getLogin')->name('login');
	Route::post('login', 'AuthController@postLogin');

	Route::get('forgot-password', 'AuthController@getForgot')->name('forgot-password');

	Route::get('logout', 'AuthController@getLogout')->name('logout');
	
	Route::get('register', 'AuthController@getRegister')->name('register');
	Route::post('register', 'AuthController@postRegister');

});