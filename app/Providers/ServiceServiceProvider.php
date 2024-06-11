<?php

namespace App\Providers;

use App\Factories\Activity\ActivityFactory;
use App\Factories\Activity\ActivityIndexDTOFactory;
use App\Factories\Activity\ActivityStoreDTOFactory;
use App\Factories\Activity\ActivityUpdateDTOFactory;
use App\Factories\Activity\Contracts\ActivityFactoryInterface;
use App\Factories\Activity\Contracts\ActivityIndexDTOFactoryInterface;
use App\Factories\Activity\Contracts\ActivityStoreDTOFactoryInterface;
use App\Factories\Activity\Contracts\ActivityUpdateDTOFactoryInterface;
use App\Factories\AuthCredentialsDTOFactory;
use App\Factories\Contracts\AuthCredentialsDTOFactoryInterface;
use App\Factories\Contracts\LogoutDTOFactoryInterface;
use App\Factories\Contracts\RegisterUserDTOFactoryInterface;
use App\Factories\Contracts\UserFactoryInterface;
use App\Factories\LogoutDTOFactory;
use App\Factories\RegisterUserDTOFactory;
use App\Factories\UserFactory;
use App\Services\Activity\ActivityService;
use App\Services\Activity\Contracts\ActivityServiceInterface;
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
        $this->app->bind(AuthCredentialsDTOFactoryInterface::class, AuthCredentialsDTOFactory::class);
        $this->app->bind(ActivityServiceInterface::class, ActivityService::class);
        $this->app->bind(RegisterUserDTOFactoryInterface::class, RegisterUserDTOFactory::class);
        $this->app->bind(LogoutDTOFactoryInterface::class, LogoutDTOFactory::class);
        $this->app->bind(ActivityIndexDTOFactoryInterface::class, ActivityIndexDTOFactory::class);
        $this->app->bind(ActivityStoreDTOFactoryInterface::class, ActivityStoreDTOFactory::class);
        $this->app->bind(ActivityUpdateDTOFactoryInterface::class, ActivityUpdateDTOFactory::class);
        $this->app->bind(ActivityFactoryInterface::class, ActivityFactory::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        //
    }
}
