<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeSheet extends Model
{
    protected $casts = [
        'start_time' => 'time',
        'end_time' => 'time',
    ];
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function operation()
    {
        return $this->belongsTo(OperationType::class);
    }

}
