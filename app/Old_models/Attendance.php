<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $casts=[
        'entry_time' => 'time',
        'exit_time' => 'time',
    ];

    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class);

    }

    public function isHoliday()
    {
        if (DB::table('holidays')->where('date',$this->work_day)){
            dd('hello');
        }
    }
}
