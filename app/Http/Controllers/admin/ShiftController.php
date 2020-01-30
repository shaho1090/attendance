<?php

namespace App\Http\Controllers\admin;

use App\Day;
use App\DayShift;
use App\Http\Controllers\Controller;
use App\Http\Requests\ShiftRequest;
use App\Shift;
use App\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Fqsen;
use function foo\func;

class ShiftController extends Controller
{

    public function index()
    {
//        ($shift = Shift::find(29)->id);
//        dd($shift,DayShift::query()->where('shift_id',$shift)->get()->map->workTimes);


        $shifts = Shift::query()->latest()->paginate(20);
        return view('admin.shifts.index', compact('shifts'));
    }

    public function create()
    {
        $days = Day::all();
        return view('admin.shifts.create', compact('days'));
    }

    public function store(ShiftRequest $request)
    {
        $shift = Shift::query()->create($request->validated());
//        Day::addShift($shift, $request->days);
        $shift->days()->sync($request->days);
        return back();

    }

    public function show(Shift $shift)
    {
        return view('admin.shifts.show', [
            'shift' => $shift->load('days'),
        ]);
    }


    public function addTimeForm(Shift $shift)
    {
        $days = $shift->days()->get();
        return view('admin.shifts.addTime', compact('days', 'shift'));

    }

    public function addWorkTime(Request $request, Shift $shift)
    {

        $days = DayShift::getDays($shift, $request->days);

        foreach ($days as $day) {
            Shift::addWorkTime($request->ws, $request->we, $day);
        }
        return back();


    }

//    public function addUnitForm(Shift $shift)
//    {
//        $units = Unit::all();
//        return view('admin.shifts.addUnit', compact('units', 'shift'));
//    }

//    public function addUnit(Request $request, Shift $shift)
//    {
//        ($shift->unit()->update([
//            'to' => Carbon::now()
//        ]));
//
//        $shift->unit()->sync($request->units);
//    }


    public function editTime()
    {
        dd('time');

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
