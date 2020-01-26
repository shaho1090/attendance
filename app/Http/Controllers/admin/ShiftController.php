<?php

namespace App\Http\Controllers\admin;

use App\Day;
use App\Http\Controllers\Controller;
use App\Http\Requests\ShiftRequest;
use App\Shift;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ShiftController extends Controller
{

    public function index()
    {
        $shifts = Shift::query()->latest()->paginate(20);
        return view('admin.shifts.index', compact('shifts'));
    }

    public function create()
    {
        $days = Shift::$days;
        return view('admin.shifts.create', compact('days'));
    }


    public function store(ShiftRequest $request)
    {
        dd($request->all());
        $shift = Shift::query()->create($request->validated());

        Day::addShift($shift,$request->day);
        return back();

    }


    public function show(Shift $shift)
    {
       $days = $shift->days()->get();
       return view('admin.shifts.show',compact('days'));
    }


    public function edit(Shift $shift)
    {
        //
    }


    public function update(Request $request, Shift $shift)
    {
        //
    }


    public function destroy(Shift $shift)
    {
        //
    }
}
