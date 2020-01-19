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

    public function times()
    {
        return $this->hasMany(Time::class);
    }

}
