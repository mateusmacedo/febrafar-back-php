<?php

namespace Tests\Unit;

use App\DTO\Auth\RegisterUserDTO;
use App\Factories\RegisterUserDTOFactory;
use Illuminate\Http\Request;
use Mockery;
use PHPUnit\Framework\TestCase;

class RegisterUserDTOFactoryTest extends TestCase
{
    private $registerUserDTOFactory;

    protected function setUp(): void
    {
        parent::setUp();
        $this->registerUserDTOFactory = new RegisterUserDTOFactory();
    }

    public function testCreateFromRequest(): void
    {
        $mockRequest = Mockery::mock(Request::class);
        $expectedName = 'Test User';
        $expectedEmail = 'test@example.com';
        $expectedPassword = 'password123';

        $mockRequest->shouldReceive('input') //@phpstan-ignore-line
            ->with('name')
            ->andReturn($expectedName);
        $mockRequest->shouldReceive('input') //@phpstan-ignore-line
            ->with('email')
            ->andReturn($expectedEmail);
        $mockRequest->shouldReceive('input') //@phpstan-ignore-line
            ->with('password')
            ->andReturn($expectedPassword);

        $registerUserDTO = $this->registerUserDTOFactory->createFromRequest($mockRequest);

        $this->assertInstanceOf(RegisterUserDTO::class, $registerUserDTO);
        $this->assertEquals($expectedName, $registerUserDTO->name);
        $this->assertEquals($expectedEmail, $registerUserDTO->email);
        $this->assertEquals($expectedPassword, $registerUserDTO->password);
    }
}
