<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'email_verified_at',
        'device',
        'is_active',
        'is_user',
        'is_admin',
        'role_id',
        'password',
    ];

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

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }

    public function ratings()
    {
        return $this->hasMany('App\Rating');
    }

    public function roles()
    {
        return $this
            ->belongsToMany(
                Role::class,
                'role_user',
                'user_id',
                'role_id'
            )
            ->withTimestamps();
    }

}
