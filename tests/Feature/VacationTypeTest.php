<?php

namespace Tests\Feature;

use App\Role;
use App\User;
use App\VacationType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class VacationTypeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_can_define_types_of_leaves()
    {

        $this->post(route('vacationType.store', [
            'title' => Str::random(10).' leave',
            'default_amount' => rand(0,1000),
        ]))->dump();
        
        //dd($vacationType);
        $this->assertDatabaseHas('vacationType', [
            'title' => $vacationType->title,
            'default_amount' => $vacationType->default_amount,
        ]);
    }

    public function test_admin_associate_leaves_to_users_with_amount()
    {
        Role::create(['title' => 'admin']);

        Role::create(['title' => 'user']);

        $user = $this->signIn();

        $user->setAdmin();

        //dd($user);

        factory(User::class, 3)->create();
        $user1 = User::find(1);
        $user2 = User::find(2);
        $user3 = User::find(3);

        $deserveLeave = VacationType::create(['title' => 'استحقاقی']);
        $sickLeave = VacationType::create(['title' => 'استعلاجی']);
        $withoutPayLeave = VacationType::create(['title' => 'بدون حقوق']);


        $user1->setMonthlyVacation($deserveLeave, 1020);
        $user1->setMonthlyVacation($sickLeave, 4320);
        $user1->setMonthlyVacation($withoutPayLeave, 0);

        $user2->setMonthlyVacation($deserveLeave, 1020);
        $user2->setMonthlyVacation($sickLeave, 4320);
        $user2->setMonthlyVacation($withoutPayLeave, 0);

        $user3->setMonthlyVacation($deserveLeave, 1020);
        $user3->setMonthlyVacation($sickLeave, 4320);
        $user3->setMonthlyVacation($withoutPayLeave, 0);


        //dd($user1->getTotalLeave($deserveLeave));

    }
}
