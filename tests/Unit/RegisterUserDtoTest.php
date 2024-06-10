<?php

namespace Tests\Unit;

use App\DTO\Auth\RegisterUserDTO;
use PHPUnit\Framework\TestCase;

class RegisterUserDtoTest extends TestCase
{
    public function testInstance()
    {
        $dto = new RegisterUserDTO('John Doe', 'john@example.com', 'password');
        $this->assertInstanceOf(RegisterUserDTO::class, $dto);
    }

    public function testPropertiesAreSetCorrectly()
    {
        $dto = new RegisterUserDTO('John Doe', 'john@example.com', 'password');
        $this->assertEquals('John Doe', $dto->name);
        $this->assertEquals('john@example.com', $dto->email);
        $this->assertEquals('password', $dto->password);
    }

    public function testPropertiesCanBeAccessed()
    {
        $dto = new RegisterUserDTO('John Doe', 'john@example.com', 'password');
        $this->assertEquals('John Doe', $dto->name);
        $this->assertEquals('john@example.com', $dto->email);
        $this->assertEquals('password', $dto->password);
    }
}
