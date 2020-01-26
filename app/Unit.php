<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $guarded=[];

    public function shifts()
    {
        return $this->belongsToMany(Shift::class,'shift_user')
            ->withPivot('from', 'to');
    }

}
