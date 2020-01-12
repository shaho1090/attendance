<?php

namespace Tests\Feature;

use App\Day;
use App\DemandVacation;
use App\Holiday;
use App\Shift;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{

    public function testBasicTest()
    {

        $currentDate = Carbon::parse('2020-01-01');
        $selectedDay = $currentDate->dayOfWeek;
        $dayShift = Day::find($selectedDay)->shifts;

        // find userShift and calculate start , end of work and breakTime
        $user = User::find(1);
        $userShift = $user->shifts->intersect($dayShift)->first();
        if ($userShift->break_time_start == null) {
            $startBreak = Carbon::parse($userShift->work_end);
            $endBreak = Carbon::parse($userShift->work_end);
        } else {
            $startBreak = Carbon::parse($userShift->break_time_start);
            $endBreak = Carbon::parse($userShift->break_time_end);
        }
        $startWork = Carbon::parse($userShift->work_start);
        $endWork = Carbon::parse($userShift->work_end);
        //end of userShift calculate

//calculate holiday in current time
        $holiday = Holiday::query()->whereDate('start_time', $currentDate)->first();
        $startHoliday = Carbon::parse(Carbon::parse($holiday->start_time)->format('H:i'));
        $endHoliday = Carbon::parse(Carbon::parse($holiday->end_time)->format('H:i'));

        if ($holiday != null) {
            $holidayTime = $startHoliday->diffInMinutes($endHoliday);
            if ($startHoliday < $startBreak && $endHoliday > $endBreak)
                $holidayTime -= $endBreak->diffInMinutes($startBreak);
        } else
            $holidayTime = 0;
//end of holiday
        //get user timeSheet
        $userTimeSheet = $user->timeSheets()->whereDate('finger_print_time', $currentDate)->get();
        $enEx = ($userTimeSheet->chunk(2));


// calculate users vacation time in current date
        $leave = DemandVacation::query()
            ->whereDate('start', '<=', $currentDate)->whereDate('end', '>=', $currentDate)
            ->first();
        $startLeave = Carbon::parse(Carbon::parse($leave->start)->format('H:i'));
        $endLeave = Carbon::parse(Carbon::parse($leave->end)->format('H:i'));

        if ($leave != null) {
            if ($leave->is_daily) {
                $leaveTime = 480;
            } else {
                $leaveTime = $startLeave->diffInMinutes($endLeave);
                if ($startLeave < $startBreak && $endLeave > $endBreak)
                    $leaveTime -= $endBreak->diffInMinutes($startBreak);
            }
        } else
            $leaveTime = 0;


//end of calculate users vacation


        $workingTime = 0;

        $fullTime = (($startWork)->diffInMinutes($startBreak)) + ($endBreak)->diffInMinutes($endWork);

        foreach ($enEx as $value) {
            $en = Carbon::parse((Carbon::parse($value->pluck('finger_print_time')[0])->format('H:i')));
            $ex = Carbon::parse((Carbon::parse($value->pluck('finger_print_time')[1])->format('H:i')));

            if ($en < $startBreak) {
                if ($en < $startWork)
                    $en = $startWork;

                if ($ex > $startBreak)
                    $ex = $startBreak;
                $workingTime = $en->diffInMinutes($ex);
                $fullTime -= $workingTime;
            } else {
                if ($en < $endBreak)
                    $en = $endBreak;

                if ($ex > $endWork)
                    $ex = $endWork;

                $workingTime = $en->diffInMinutes($ex);
                $fullTime -= $workingTime;
            }
        }
$missingTime = $fullTime - $leaveTime -$holidayTime;
        dd($missingTime);
    }

    public function testBasic1()
    {
        dd('jello');
    }
}
