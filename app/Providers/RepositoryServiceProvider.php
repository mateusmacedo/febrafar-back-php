<?php

namespace App\Providers;

use App\Factories\AuthCredentialsDTOFactory;
use App\Factories\Contracts\AuthCredentialsDTOFactoryInterface;
use App\Factories\Contracts\LogoutDTOFactoryInterface;
use App\Factories\Contracts\RegisterUserDTOFactoryInterface;
use App\Factories\Contracts\UserFactoryInterface;
use App\Factories\LogoutDTOFactory;
use App\Factories\RegisterUserDTOFactory;
use App\Factories\UserFactory;
use App\Repositories\Activity\ActivityRepository;
use App\Repositories\Activity\Contracts\ActivityRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\UserRepository;
use App\Services\Activity\ActivityService;
use App\Services\Activity\Contracts\ActivityServiceInterface;
use App\Services\AuthService;
use App\Services\Contracts\AuthServiceInterface;
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
        $this->app->bind(ActivityRepositoryInterface::class, ActivityRepository::class);
        $this->app->bind(ActivityServiceInterface::class, ActivityService::class);
        $this->app->bind(AuthServiceInterface::class, AuthService::class);
        $this->app->bind(RegisterUserDTOFactoryInterface::class, RegisterUserDTOFactory::class);
        $this->app->bind(AuthCredentialsDTOFactoryInterface::class, AuthCredentialsDTOFactory::class);
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
