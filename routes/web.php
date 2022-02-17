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

Route::get('toast', function ()
{
    return view('toasttest');
});

Route::get('toast/test', function()
{
    $toasts = [
        [
            'title' => 'This is a toast',
            'body' => 'This is a toast body',
            'color' => 'danger',
            'nohide' => true
        ],
        [
            'title' => 'This is another toast',
            'body' => 'This is another toast body'
        ]
    ];

    \Illuminate\Support\Facades\Session::flash('toasts', $toasts);
    return redirect()->back();
});

// Route::get('login', function() {
// 	return view('auth.login');
// })->name('login');

Route::group(['namespace' => 'App\Http\Controllers'], function() {

	Route::get('home', 'HomeController@getHome')->name('home');

    Route::group(['prefix' => 'clock'], function()
    {
       Route::get('in', 'ClockController@clockIn');
       Route::get('out', 'ClockController@clockOut');
    });

    Route::group(['prefix' => 'hours', 'middleware' => ['auth', 'clockStatus']], function()
    {
        Route::get('/', 'HoursController@getHoursView')->name('hours');

        Route::get('edit/{id}', 'HoursController@getHour')->name('editHour');
        Route::post('edit/{id}', 'HoursController@updateHour');

        Route::post('delete', 'HoursController@postDelete')->name('deleteHour');

        Route::get('add', 'HoursController@getAdd')->name('addHour');
        Route::post('add', 'HoursController@postAdd')->name('postHour');
    });

	Route::get('settings', 'SettingsController@getSettings')->name('settings');
    Route::post('settings/userinfo', 'SettingsController@updateUserInfo')->name('settings.userinfo');
    Route::post('settings/password', 'SettingsController@changePassword')->name('settings.password');
    Route::post('settings/timesettings', 'SettingsController@updateTimeSettings')->name('settings.timesettings');

	Route::get('login', 'AuthController@getLogin')->name('login');
	Route::post('login', 'AuthController@postLogin');

	Route::get('forgot-password', 'AuthController@getForgot')->name('forgot-password');

	Route::get('logout', 'AuthController@getLogout')->name('logout');

	Route::get('register', 'AuthController@getRegister')->name('register');
	Route::post('register', 'AuthController@postRegister');

});
