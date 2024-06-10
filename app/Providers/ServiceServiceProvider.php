<?php

namespace App\Providers;

use App\Factories\AuthCredentialsDTOFactory;
use App\Factories\Contracts\AuthCredentialsDTOFactoryInterface;
use App\Factories\Contracts\RegisterUserDTOFactoryInterface;
use App\Factories\Contracts\UserFactoryInterface;
use App\Factories\RegisterUserDTOFactory;
use App\Factories\UserFactory;
use App\Services\AuthService;
use App\Services\Contracts\AuthServiceInterface;
use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        $this->app->bind(AuthServiceInterface::class, AuthService::class);
        $this->app->bind(UserFactoryInterface::class, UserFactory::class);
        $this->app->bind(RegisterUserDTOFactoryInterface::class, RegisterUserDTOFactory::class);
        $this->app->bind(AuthCredentialsDTOFactoryInterface::class, AuthCredentialsDTOFactory::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        //
    }
}
