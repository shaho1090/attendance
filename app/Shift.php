<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    protected $casts = [
        'work_start' => 'time',
        'work_end' => 'time',
        'break_time_start' => 'time',
        'break_time_end' => 'time',
    ];
    protected $fillable = [
        'title',
        'over_time_before',
        'work_start',
        'work_end',
        'break_time_start',
        'break_time_end',
        'over_time_after'];


    public function days()
    {
        return $this->belongsToMany(Day::class, 'day_shift')->withPivot('id', 'from', 'to');
    }

    public function unit()
    {
        return $this->belongsToMany(Unit::class, 'shift_unit')
            ->withPivot('from', 'to');
    }

    public static function addWorkTime($start, $end, $day)
    {
        for ($counter = 1; $counter < sizeof($start) + 1; $counter++) {
            $day->workTimes()->create([
                'start' => $start[$counter],
                'end' => $end[$counter]
            ]);
        }
        session()->flash('flash_message', 'زمان های مورد نظر با موفقیت ثبت شدند');
    }

    public static function updateTitle($shift)
    {

    }

    public static function updateUnit($shift)
    {

    }

    public static function updateworkTime($shift)
    {

    }


}
