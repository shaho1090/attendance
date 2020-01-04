<?php

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

use App\User;
use Carbon\Carbon;

Route::get('/', function () {

    $currentDate=Carbon::parse('2020-01-05');
    $currentDate->englishDayOfWeek;
    $user = User::find(2);
    $shifts = $user->shifts;
    dd($user->attendances);
    $shifts->each(function ($test){
//       dump($test->days()->where('title','Friday')->pluck('id')->first());
    });
//    return view('welcome');


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
