<?php

namespace App\DTO\Auth;

/**
 * Class AuthCredentialsDTO
 * @package App\DTO\Auth
 */
class AuthCredentialsDTO
{
    public function __construct(public readonly string $email, public readonly string $password)
    {
    }
}
