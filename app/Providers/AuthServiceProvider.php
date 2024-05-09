<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        
        $this->app['auth']->provider('custom', function ($app, array $config) {
            return new \App\Auth\CustomUserProvider($app['hash'], $config['model']);
        });

        Auth::provider('custom', function ($app, array $config) {
            return new \App\Auth\CustomUserProvider($app['hash'], $config['model']);
        });
    }
}
