<?php

namespace Tests\Feature;

use App\Role;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_can_log_in()
    {
        $this->withoutExceptionHandling();

        $user = User::create([
            'name' => 'admin1',
            'family' => 'admini',
            'password' => bcrypt('123456789'),
            'personal_code' => '10127',
            'national_code' => '1234567890',
            'email' => 'admin.admini@gmail.com'
        ]);

        $this->assertEquals('10127', User::first()->personal_code);

        $role = Role::create([
            'title' => 'admin'
        ]);

        $user->setAdmin();

        $this->assertTrue($user->isAdmin());

        $this->post(route('login'), [
            'personal_code' => $user->personal_code,
            'password' => '123456789',
        ])->assertRedirect('/home');
    }

    public function test_admin_can_see_users_list_on_users_index_page()
    {
        $admin = 
    }


}
