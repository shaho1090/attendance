<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    protected $casts =[
        'start_time'=>'datetime',
        'end_time'=>'datetime',
];
    protected $fillable = [
        'title',
        'start_time',
        'end_time',
        'description'];
}
