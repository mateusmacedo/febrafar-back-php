<?php

namespace App\Factories\Contracts;

use App\DTO\Auth\RegisterUserDTO;
use App\Models\User;

interface UserFactoryInterface
{
    /**
     * Create a new User instance from RegisterUserDTO.
     * @param RegisterUserDTO $registerUserDTO
     * @return User
     */
    public function createFromDTO(RegisterUserDTO $registerUserDTO): User;
}
