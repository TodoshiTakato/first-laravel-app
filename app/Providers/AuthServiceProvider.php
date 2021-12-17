<?php

namespace App\Providers;

use App\Task;
use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('create_task', function($user) {
            return $user->is_admin || auth()->check();
        });
        Gate::define('update_task', function($user, Task $task) {
            return $user->is_admin || (auth()->check() && $task->user_id == auth()->id());
        });
        Gate::define('delete_task', function($user, Task $task) {
            return $user->roles->is_admin || (auth()->check() && $task->user_id == auth()->id());
        });

    }
}
