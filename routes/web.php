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
    $currentDate = Carbon::parse('2020-01-06');
    $selectedDay = $currentDate->dayOfWeek;
    $dayShift = \App\Day::find($selectedDay)->shifts;
    $user = User::find(1);
    $userShift = $user->shifts->intersect($dayShift)->first();
    $userTimeSheet = $user->timeSheets()->whereDate('finger_print_time', $currentDate)->get();




    foreach ($userTimeSheet as $value) {
        $value = Carbon::parse($value->finger_print_time)->format("h:i");
        $value = Carbon::parse($value);

        $start = Carbon::parse($userShift->work_start);
        $end = Carbon::parse($userShift->work_end);

        $diff = $value->diffInMinutes($start);


    }

    $first = Carbon::parse($userShift->work_start);
    $second = Carbon::parse($userTimeSheet)->format("h:i");
    dd((Carbon::parse($second)->diffInMinutes($first)));


//   dd($userTimeSheet->wheredate('finger_print_time',$date)->get());


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
