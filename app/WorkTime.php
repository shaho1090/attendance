<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkTime extends Model
{
   protected $guarded= [];

   public function day()
   {
       return $this->belongsTo(Day::class);
   }
}
