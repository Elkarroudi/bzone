<?php

namespace App\Providers\Custom;

use App\Repositories\Contracts\Auth\RegistrationRepositoryInterface;
use App\Repositories\Implementations\Auth\RegistrationRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryLayerProvider extends ServiceProvider
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
        app()->bind(RegistrationRepositoryInterface::class, RegistrationRepository::class);
    }
}
