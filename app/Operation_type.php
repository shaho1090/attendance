<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation_type extends Model
{
    protected $guarded = [];

    public function vacations()
    {
        return $this->hasMany(Demand_vacation::class);

    }
}
