<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\Concerns\InteractsWithAuthentication;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tests\CreatesApplication;
//use Faker\Test\Provider\BaseTest;

class MyUserFactory extends TestCase
{
    use InteractsWithAuthentication;

    //protected $user = null;

    protected $role = null;

    protected $permission = null;

    //protected $projectsCount = 0;

    //protected $membersCount = 0;


//    public function ownedBy(User $user)
//    {
//        $this->user = $user;
//
//        return $this;
//    }

    public function withRole(string $role)
    {
        $this->role = $role;

         return $this;
   }

    public function withPermission(string $permission)
    {
        $this->permission = $permission;

        return $this;
   }

//    public function withMembers(int $count)
//    {
//        $this->membersCount = $count;
//
//        return $this;
//    }

    public function create()
    {

       // if ($this->user === null) {

//            $this->be($user);
       // }

     //   $workSpace = $this->user->addWorkSpace();

//        factory(Tag::class, $this->tagsCount)->create([
//            'work_space_id' => $workSpace->id,
//        ]);

//        factory(Project::class, $this->projectsCount)->create([
//            'work_space_id' => $workSpace->id,
//        ]);

       // return $user;
    }

}
