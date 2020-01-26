<?php

namespace App\Http\Controllers;

use App\DemandVacation;
use App\HourlyDaily;
use App\JustificationType;
use App\User;
use App\VacationType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DemandVacationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd($user->demandVacations());
        Auth::user()->demandVacations()->get();
        return view('demand-vacations.index', [
            'users' => DemandVacation::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('demand-vacations.create',[
            'justification_types'=> JustificationType::all(),
            'hourly_daily'=> HourlyDaily::all(),
            'vacation_types' => VacationType::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd(Auth::user()->name);
        //dd($request->get('justification_type_id'));
        //dd($request->get('hourly_daily_id'));
        //dd($request->get('vacation_type_id'));
        //dd($request->get('from_date'));
        //dd($request->get('to_date'));
        //dd($request->get('from_time'));
        //dd($request->get('to_time'));
        //dd($request->get('description'));

        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
