<?php

namespace App\DTO\Auth;

/**
 * Class AuthCredentialsDTO
 * @package App\DTO\Auth
 */
class AuthCredentialsDTO
{
    /**
     * @var string
     */
    public string $email;

    /**
     * @var string
     */
    public string $password;

    /**
     * AuthCredentialsDTO constructor.
     * @param string $email
     * @param string $password
     */
    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }
}
