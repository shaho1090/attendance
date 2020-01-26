<?php

namespace App;

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
        return $this->hasMany(Day::class);
    }

    public function Unit()
    {
        return $this->belongsToMany(User::class);
    }

    public static $days = [
        [
            'id' => 1,
            'title' => 'Monday',
            'faTitle' => 'دوشنبه'
        ],
        [
            'id' => 2,
            'title' => 'Tuesday',
            'faTitle' => 'سه شنبه'
        ],
        [
            'id' => 3,
            'title' => 'Wednesday',
            'faTitle' => 'چهارشنبه'
        ],
        [
            'id' => 4,
            'title' => 'Thursday',
            'faTitle' => 'پنج شنبه'
        ],
        [
            'id' => 5,
            'title' => 'Friday',
            'faTitle' => 'جمعه'
        ],
        [
            'id' => 6,
            'title' => 'Saturday',
            'faTitle' => 'شنبه'
        ], [
            'id' => 7,
            'title' => 'Sunday',
            'faTitle' => 'یکشنبه'
        ],
    ];
}
