<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\VacationType;
use Illuminate\Http\Request;

class VacationTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$vacationTypes = VacationType::all();

        return view('admin.vacationTypes.index', [
            'vacationTypes'=>  VacationType::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.vacationTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        VacationType::create([
            'title' => $request->get('title'),
            'default_amount' => $request->get('default_amount'),
        ]);

        //$vacationTypes = VacationType::all();

        return view('admin.vacationTypes.index', [
            'vacationTypes'=> VacationType::all()
        ]);
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
     * @param VacationType $vacationType
     * @return void
     */
    public function destroy(VacationType $vacationType)
    {
        $vacationType->delete();
        return redirect(route('vacationType.index'));
    }
}
