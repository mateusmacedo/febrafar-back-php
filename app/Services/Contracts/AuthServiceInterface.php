<?php

namespace App\Services\Contracts;

use App\DTO\Auth\AuthCredentialsDTO;
use App\DTO\Auth\LogoutDTO;
use App\DTO\Auth\RegisterUserDTO;
use App\Models\User;

interface AuthServiceInterface
{
    /**
     * Register a new user.
     * @param RegisterUserDTO $registerUserDTO
     * @return User
     */
    public function register(RegisterUserDTO $registerUserDTO): User;

    /**
     * Authenticate a user.
     * @param AuthCredentialsDTO $authCredentialsDTO
     * @return User|null
     */
    public function authenticate(AuthCredentialsDTO $authCredentialsDTO): ?User;

    /**
     * Logout the authenticated user.
     * @param LogoutDTO $logoutDTO
     * @return void
     */
    public function logout(LogoutDTO $logoutDTO): void;
}
