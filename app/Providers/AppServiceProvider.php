<?php

namespace App\Providers;

use App\Actions\Fortify\LoginResponseImpl;
use App\Actions\Fortify\RegisterResponseImpl;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Contracts\RegisterResponse;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();
        $this->app->singleton(RegisterResponse::class,RegisterResponseImpl::class);
        $this->app->singleton(LoginResponse::class,LoginResponseImpl::class);
    }
}
