<?php

namespace App\Providers;

use App\Factories\Contracts\LogoutDTOFactoryInterface;
use App\Factories\Contracts\UserFactoryInterface;
use App\Factories\LogoutDTOFactory;
use App\Factories\UserFactory;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(UserFactoryInterface::class, UserFactory::class);
        $this->app->bind(LogoutDTOFactoryInterface::class, LogoutDTOFactory::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        //
    }
}
