<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time_sheet extends Model
{
    protected $fillable = ['entry','exit'];
}
