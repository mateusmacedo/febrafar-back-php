<?php

namespace Tests\Unit;

use App\DTO\Auth\AuthCredentialsDTO;
use App\DTO\Auth\LogoutDTO;
use App\DTO\Auth\RegisterUserDTO;
use App\Factories\Contracts\UserFactoryInterface;
use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\AuthService;
use App\Services\Contracts\AuthServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;
use Mockery;
use PHPUnit\Framework\MockObject\MockObject;
use Tests\TestCase;

class AuthServiceTest extends TestCase
{
    /** @var AuthServiceInterface|MockObject */
    protected $authService;
    /** @var UserRepositoryInterface|MockObject */
    protected $userRepository;
    /** @var UserFactoryInterface|MockObject */
    protected $userFactory;

    protected function setUp(): void
    {
        parent::setUp();
        $this->userRepository = $this->createMock(UserRepositoryInterface::class);
        $this->userFactory = $this->createMock(UserFactoryInterface::class);
        $this->authService = new AuthService($this->userRepository, $this->userFactory);
    }

    public function testRegister()
    {
        $registerUserDTO = new RegisterUserDTO('John Doe', 'john@example.com', 'password');
        $user = new User();
        $user->name = 'John Doe';
        $user->email = 'john@example.com';
        $user->password = Hash::make('password');

        $this->userFactory->expects($this->once())
            ->method('createFromDTO')
            ->with($registerUserDTO)
            ->willReturn($user);

        $this->userRepository->expects($this->once())
            ->method('save')
            ->with($user)
            ->willReturn($user);

        $result = $this->authService->register($registerUserDTO);

        $this->assertEquals($user, $result);
    }

    public function testAuthenticate()
    {
        $credentialsDTO = new AuthCredentialsDTO('john@example.com', 'password');
        $user = new User();
        $user->email = 'john@example.com';
        $user->password = Hash::make('password');

        Auth::shouldReceive('attempt')
            ->once()
            ->with(['email' => 'john@example.com', 'password' => 'password'])
            ->andReturn(true);

        Auth::shouldReceive('user')
            ->once()
            ->andReturn($user);

        $result = $this->authService->authenticate($credentialsDTO);

        $this->assertEquals($user, $result);
    }

    public function testLogout()
    {
        /** @var User $user */
        $user = Mockery::mock(User::class)->makePartial()->shouldIgnoreMissing();
        $token = Mockery::mock(PersonalAccessToken::class)->shouldIgnoreMissing();

        $token->shouldReceive('delete')->once(); //@phpstan-ignore-line

        $user->shouldReceive('currentAccessToken')->andReturn($token); //@phpstan-ignore-line

        $logoutDTO = new LogoutDTO($user);

        $this->authService->logout($logoutDTO);

        $this->assertTrue(true); // No exceptions means success
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
