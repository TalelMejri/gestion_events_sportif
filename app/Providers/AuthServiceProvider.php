<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\EvenementSportif;
use App\Models\User;
use App\Policies\EventSportifPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        EvenementSportif::class=>EventSportifPolicy::class,
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
      //  $this->registerPolicies();

        Gate::define('admin-view',function (User $user){
            return $user->role=='Admin';
        });
        Gate::define('organisateur-view',function (User $user){
            return $user->role=='Organisateur';
        });
    }
}
