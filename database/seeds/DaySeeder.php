<?php

use Illuminate\Database\Seeder;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('days')->insert([

            [
                'title' => 'Monday',
            ],
            [
                'title' => 'Tuesday',
            ],
            [
                'title' => 'Wednesday',
            ],
            [
                'title' => 'Thursday',
            ],

            [
                'title' => 'Friday',
            ],
            [
                'title' => 'Saturday',
            ],
            [
                'title' => 'Sunday',
            ],
            ]);
    }
}
