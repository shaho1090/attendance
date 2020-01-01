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
    $att = $user->attendances;
    $currentDate = "2020-01-01";
    $currentDate = date('Y:m:d',strtotime($currentDate));
    dd($att->find(1)->entry);
    //dd($att->where('entry', 'like', $currentDate));
    $shift = $user->shifts;
    $demand = $user->vacations;


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
