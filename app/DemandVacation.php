<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DemandVacation extends Model
{
    protected $casts =[
        'start'=>'time',
        'end'=>'time'
    ];
    protected $guarded = [];

    public function operation()
    {
     return $this->belongsTo(OperationType::class);
    }

    public function user()
    {

        return $this->belongsTo(User::class);

    }
}
