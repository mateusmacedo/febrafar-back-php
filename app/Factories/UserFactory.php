<?php

namespace App\Factories;

use App\DTO\Auth\RegisterUserDTO;
use App\Factories\Contracts\UserFactoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserFactory
 * @package App\Factories
 */
class UserFactory implements UserFactoryInterface
{
    /**
     * Create a new User instance from RegisterUserDTO.
     * @param RegisterUserDTO $registerUserDTO
     * @return User
     */
    public function createFromDTO(RegisterUserDTO $registerUserDTO): User
    {
        $user = new User();
        $user->name = $registerUserDTO->name;
        $user->email = $registerUserDTO->email;
        $user->password = Hash::make($registerUserDTO->password);

        return $user;
    }
}
