<?php

namespace App\DTO\Auth;

/**
 * Class RegisterUserDTO
 * @package App\DTO\Auth
 */
class RegisterUserDTO
{
    /**
     * @var string
     */
    public string $name;

    /**
     * @var string
     */
    public string $email;

    /**
     * @var string
     */
    public string $password;

    /**
     * RegisterUserDTO constructor.
     * @param string $name
     * @param string $email
     * @param string $password
     */
    public function __construct(string $name, string $email, string $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }
}
