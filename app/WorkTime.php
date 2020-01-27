<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkTime extends Model
{
    protected $guarded = [];

    public function day()
    {
        return $this->belongsTo(Day::class);
    }

    public static function addWorkTime($start, $end,$day)
    {
        for ($counter = 1; $counter < sizeof($start) + 1; $counter++) {
            (Day::query()->find($day))->workTimes()->create([
                'start' => $start[$counter],
                'end' => $end[$counter]
            ]);
        }
        session()->flash('flash_message', 'زمان های مورد نظر با موفقیت ثبت شدند');
    }
}
