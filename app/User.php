<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = [
//        'name', 'email', 'password', 'family', 'national_code', 'personal_code'
//    ];

    protected $guarded = [
        'name',
        'family',
        'national_code',
        'personal_code',
        'email',
        'password'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role');
    }

    public function setAdmin()
    {
        //    $role = Role::where('title','admin')->get()->first()->id;
        $this->roles()->attach(Role::where('title', 'admin')->get()->first()->id);
    }

    public function isAdmin()
    {
        return $this->roles()->where('title', '=', 'admin')->exists();
    }
}
