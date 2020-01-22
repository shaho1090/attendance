<?php

namespace Tests\Feature;

use App\Role;
use App\User;
use App\VacationType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VacationTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_can_define_kinds_of_vacations_and_associate_to_users_with_amout()
    {
        Role::create(['title'=>'admin']);

        Role::create(['title'=>'user']);

        $user = $this->signIn();

        $user->setAdmin();

        //dd($user);

        factory(User::class,3)->create();
        $user1 = User::find(1);
        $user2 = User::find(2);
        $user3 = User::find(3);

        $deserveLeave = VacationType::create(['title'=>'استحقاقی']);
        $sickLeave = VacationType::create(['title'=>'استعلاجی']);
        $withoutPayLeave = VacationType::create(['title'=>'بدون حقوق']);

        $user1->vacationTypes()->attach($deserveLeave->id, ['amount'=>17]);
        $user1->vacationTypes()->attach( $sickLeave->id, ['amount'=>72]);
        $user1->vacationTypes()->attach( $withoutPayLeave->id, ['amount'=>0]);

        dd($user1->vacationAmount($sickLeave));

    }
}
