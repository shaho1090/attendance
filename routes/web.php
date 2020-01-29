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


Route::get('/', function () {
    return view('welcome');
});

Route::namespace('admin')->prefix('/admin')->group(function () {

    //**************Unit Route**************
    Route::resource('units', 'UnitController');
    Route::get('/units/addShiftForm/{unit}', 'UnitController@addShiftForm')->name('units.addShiftForm');
    Route::post('/units/addShift/{unit}', 'UnitController@addShift')->name('units.addShift');

    //**************Shift Route**************
    Route::resource('shifts', 'ShiftController');
    Route::get('/shift/addTimeForm/{shift}', 'ShiftController@addTimeForm')->name('shifts.addTimeForm');
    Route::post('/shift/addWorkTime/{shift}', 'ShiftController@addWorkTime')->name('shifts.addWorkTime');
    Route::get('/shift/addDays/{shift}', 'ShiftController@addDaysForm')->name('shifts.addDaysForm');
    Route::post('/shift/addDays/{shift}', 'ShiftController@addDays')->name('shifts.addDays');
    Route::get('/shift/removeDays/{shift}', 'ShiftController@removeDaysForm')->name('shifts.removeDaysForm');

    //**************WorkTime Route**************
    Route::resource('workTime', 'WorkTimeController');

});

Route::resource('users', 'admin\UsersController');
Route::resource('vacationType', 'admin\VacationTypeController');
Route::resource('specialVacation', 'admin\SpecialVacationController');
Route::resource('holidays', 'admin\HolidayController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

