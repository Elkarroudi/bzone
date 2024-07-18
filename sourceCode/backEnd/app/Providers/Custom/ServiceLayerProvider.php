<?php

namespace App\Providers\Custom;

use App\Services\Contracts\Auth\AuthenticationServiceInterface;
use App\Services\Contracts\Auth\RegistrationServiceInterface;
use App\Services\Implementations\Auth\AuthenticationService;
use App\Services\Implementations\Auth\RegistrationService;
use Illuminate\Support\ServiceProvider;

class ServiceLayerProvider extends ServiceProvider
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
        app()->bind(RegistrationServiceInterface::class, RegistrationService::class);
        app()->bind(AuthenticationServiceInterface::class, AuthenticationService::class);
    }
}
