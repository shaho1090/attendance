<?php

namespace App;

use Facade\FlareClient\Time\Time;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{

    protected $guarded = [];

    public function shift ()
    {
        return $this->belongsTo(Shift::class);
    }


    public function workTimes()
    {
        return $this->hasMany(WorkTime::class);
    }

    public static function addShift($shift,$days)
    {
        foreach ($days as $day){
            $shift->days()->create([
                'title'=>$day
            ]);
        }
        session()->flash('flash_message', 'شیفت مورد نظر با موفقیت ثبت شد');


    }


}
