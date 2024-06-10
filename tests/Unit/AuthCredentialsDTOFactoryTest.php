<?php

namespace Tests\Unit;

use App\DTO\Auth\AuthCredentialsDTO;
use App\Factories\AuthCredentialsDTOFactory;
use Illuminate\Http\Request;
use Mockery;
use PHPUnit\Framework\TestCase;

class AuthCredentialsDTOFactoryTest extends TestCase
{
    private $authCredentialsDTOFactory;

    protected function setUp(): void
    {
        parent::setUp();
        $this->authCredentialsDTOFactory = new AuthCredentialsDTOFactory();
    }

    public function testCreateFromRequest(): void
    {
        $mockRequest = Mockery::mock(Request::class);
        $expectedEmail = 'test@example.com';
        $expectedPassword = 'password123';
        $mockRequest->shouldReceive('input') //@phpstan-ignore-line
            ->with('email')
            ->andReturn($expectedEmail);
        $mockRequest->shouldReceive('input') //@phpstan-ignore-line
            ->with('password')
            ->andReturn($expectedPassword);

        $authCredentialsDTO = $this->authCredentialsDTOFactory->createFromRequest($mockRequest);
        $this->assertInstanceOf(AuthCredentialsDTO::class, $authCredentialsDTO);
        $this->assertEquals($expectedEmail, $authCredentialsDTO->email);
        $this->assertEquals($expectedPassword, $authCredentialsDTO->password);
    }
}
