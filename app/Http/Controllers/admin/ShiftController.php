<?php

namespace App\Http\Controllers\admin;

use App\Day;
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
        $shift = Shift::query()->create($request->validated());
        Day::addShift($shift, $request->days);
        return back();

    }

    public function show(Shift $shift)
    {
        return view('admin.shifts.show',compact('shift'));

    }

    public function addTimeForm(Shift $shift)
    {
        $days = $shift->days()->get();
        return view('admin.shifts.addTime', compact('days', 'shift'));

    }

    public function addUnitForm(Shift $shift)
    {
        $units = Unit::all();
        return view('admin.shifts.addUnit', compact('units', 'shift'));
    }

    public function addUnit(Request $request, Shift $shift)
    {
        $shift->unit()->sync($request->units);
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
