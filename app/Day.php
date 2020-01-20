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


}
