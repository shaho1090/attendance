<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class times extends Model
{
    protected $fillable = [];

    public function day()
    {
        return $this->belongsTo(Day::class);
    }
}
