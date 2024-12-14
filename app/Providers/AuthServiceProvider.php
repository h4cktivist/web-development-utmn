<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Team;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('update-team', function (User $user, Team $team) {
            return $user->is_admin || $team->user_id === $user->id;
        });

        Gate::define('delete-team', function (User $user, Team $team) {
            return $user->is_admin || $team->user_id === $user->id;
        });

        Gate::define('restore-team', function (User $user, Team $team) {
            return $user->is_admin;
        });

        Gate::define('force-delete-team', function (User $user, Team $team) {
            return $user->is_admin;
        });
    }
}
