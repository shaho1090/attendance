<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VacationType extends Model
{
    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany(User::class,'user_vacation_amount');
    }
}


