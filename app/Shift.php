<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    protected $fillable = [
        'title',
        'over_time_before',
        'work_start',
        'work_end',
        'break_time_start',
        'break_time_end',
        'over_time_after'];
}
