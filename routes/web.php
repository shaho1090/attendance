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

use App\Day;
use App\Shift;
use App\User;

Route::get('/', function () {
//    dd(Shift::all());
//    dd(Day::all());
    $user = User::find(2);

    $currentDate = "2020-01-03";
    //$currentDate = date('Y:m:d',strtotime($currentDate));
   // dd($currentDate);
    $work_day = $user->attendances()->where('work_day','=',$currentDate)->get();

    if($work_day->isEmpty()){
        dd($work_day->isHoliday());
    }
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
