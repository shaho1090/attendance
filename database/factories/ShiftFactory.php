<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Shift;
use Faker\Generator as Faker;

$factory->define(Shift::class, function (Faker $faker) {
    return [
        'title'=>$faker->title,
        'work_start'=>$faker->time(),
        'work_end'=>$faker->time(),
        'break_time_start'=>$faker->time(),
        'break_time_end'=>$faker->time(),

    ];
});
