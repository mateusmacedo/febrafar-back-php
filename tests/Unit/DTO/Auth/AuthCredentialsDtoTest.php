<?php

namespace Tests\Unit\DTO\Auth;

use App\DTO\Auth\AuthCredentialsDTO;
use PHPUnit\Framework\TestCase;

class AuthCredentialsDtoTest extends TestCase
{
    private $authCredentialsDTO;

    protected function setUp(): void
    {
        parent::setUp();
        $this->authCredentialsDTO = new AuthCredentialsDTO('test@example.com', 'password123');
    }

    public function testGetEmail(): void
    {
        $this->assertEquals('test@example.com', $this->authCredentialsDTO->email);
    }

    public function testGetPassword(): void
    {
        $this->assertEquals('password123', $this->authCredentialsDTO->password);
    }
}
