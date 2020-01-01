<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{

    protected $guarded = [];

    public function shifts ()
    {
        return $this->belongsToMany(Shift::class);
    }

}
