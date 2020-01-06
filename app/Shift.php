<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;
use function foo\func;

class Shift extends Model
{
        protected $casts=[
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


    public function days ()
    {
        return $this->belongsToMany(Day::class);
    }

    public function users ()
    {
        return $this->belongsToMany(User::class);
    }
}
