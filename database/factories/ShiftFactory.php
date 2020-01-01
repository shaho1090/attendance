<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Shift;
use Faker\Generator as Faker;

$factory->define(Shift::class, function (Faker $faker) {
    return [
        'title'=>$faker->title,
        'over_time_before'=>$faker->dateTime,
        'work_start'=>$faker->dateTime,
        'work_end'=>$faker->dateTime,
        'break_time_start'=>$faker->dateTime,
        'break_time_end'=>$faker->dateTime,
        'over_time_after'=>$faker->dateTime
    ];
});
