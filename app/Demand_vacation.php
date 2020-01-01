<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demand_vacation extends Model
{
    protected $guarded = [];

    public function operation()
    {
     return $this->belongsTo(Operation_type::class);
    }

    public function user()
    {
     return $this->belongsTo(User::class);
    }
}
