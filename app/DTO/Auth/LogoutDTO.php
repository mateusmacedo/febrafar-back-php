<?php

namespace App\DTO\Auth;

use App\Models\User;

/**
 * Class LogoutDTO
 * @package App\DTO\Auth
 */
class LogoutDTO
{
    /**
     * @var User
     */
    public User $user;

    /**
     * LogoutDTO constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
