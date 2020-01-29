<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DayShift extends Model
{
    protected $guarded = [];
    protected $table = 'day_shift';

    public function workTimes()
    {
        return $this->hasMany(WorkTime::class,'day_shift_id');
    }
}
