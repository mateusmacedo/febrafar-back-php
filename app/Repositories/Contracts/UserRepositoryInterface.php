<?php

namespace App\Repositories\Contracts;

use App\Models\User;

interface UserRepositoryInterface
{
    /**
     * Save a user.
     * @param User $user
     * @return User
     */
    public function save(User $user): User;

    /**
     * Find a user by email.
     * @param string $email
     * @return User|null
     */
    public function findByEmail(string $email): ?User;
}
