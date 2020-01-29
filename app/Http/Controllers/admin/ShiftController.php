<?php

namespace App\Http\Controllers\admin;

use App\Day;
use App\DayShift;
use App\Http\Controllers\Controller;
use App\Http\Requests\ShiftRequest;
use App\Shift;
use App\Unit;
use Carbon\Carbon;
use http\Env\Url;
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
        $days = Day::all();
        return view('admin.shifts.create', compact('days'));
    }

    public function store(ShiftRequest $request)
    {
        $shift = Shift::query()->create($request->validated());
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

    public function addDaysForm(Shift $shift)
    {
        $days = Day::all()->diff($shift->days);
        return view('admin.shifts.addDay', compact('shift', 'days'));
    }

    public function addDays(Request $request, Shift $shift)
    {
        $shift->days()->attach($request->days);
        session()->flash('flash_message', 'روزهای مورد نظر با موفقیت ثبت شدند');
        return redirect(route('shifts.index'));

    }

    public function edit(Shift $shift)
    {
        $days = Day::all();
        return view('admin.shifts.edit', compact('days', 'shift'));
    }

    public function update(ShiftRequest $request, Shift $shift)
    {


    }

    public function destroy(Shift $shift)
    {
        //
    }
}
