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
    Route::get('/shift/editUnit/{shift}', 'ShiftController@editUnit')->name('shifts.editUnit');
    Route::get('/shift/editTime/{shift}', 'ShiftController@editTime')->name('shifts.editTime');

    //**************WorkTime Route**************
    Route::resource('workTime', 'WorkTimeController');

});

Route::resource('users', 'admin\UsersController');
Route::resource('vacationType', 'admin\VacationTypeController');
Route::resource('specialVacation', 'admin\SpecialVacationController');
Route::resource('holidays', 'admin\HolidayController');
Route::resource('demandVacation', 'DemandVacationController');
Route::resource('userVacation', 'admin\UserVacationController');
Route::resource('attendanceFiles', 'admin\AttendanceFileController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('demandVacation', 'DemandVacationController')->middleware('auth');
