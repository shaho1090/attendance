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




    //dd($work_day->toArray());



//    if(date("Y:m:d",strtotime($attendances->find(1)->entry))===$currentDate){
//        dd('hello');
//    }
//    else{
//        dd('goodBy');
//    }



   /* dd($att->map(function($query) use ($currentDate){
        $query->where('entry','like',$currentDate)->get();
     }));*/


    //dd($att->where('entry', 'like', $currentDate));
    $shift = $user->shifts;
   // $demand = $user->vacations;



});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
