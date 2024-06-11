<?php

namespace Tests\Unit\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use Tests\TestCase;

class UserRepositoryTest extends TestCase
{
    use RefreshDatabase;

    protected $userRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->userRepository = Mockery::mock(UserRepositoryInterface::class);
    }

    public function testSave()
    {
        $user = Mockery::mock(User::class);

        $this->userRepository->shouldReceive('save')
            ->once()
            ->with($user)
            ->andReturn($user);

        $result = $this->userRepository->save($user);

        $this->assertInstanceOf(User::class, $result);
    }

    public function testFindByEmail()
    {
        $email = 'john@example.com';
        $user = Mockery::mock(User::class);
        $user->shouldReceive('getAttribute')->with('email')->andReturn($email); //@phpstan-ignore-line

        $this->userRepository->shouldReceive('findByEmail')
            ->once()
            ->with($email)
            ->andReturn($user);

        $foundUser = $this->userRepository->findByEmail($email);

        $this->assertInstanceOf(User::class, $foundUser);
        $this->assertEquals($email, $foundUser->email);
    }

    public function testDelete()
    {
        $user = Mockery::mock(User::class);
        $this->userRepository->shouldReceive('delete')
            ->once()
            ->with($user)
            ->andReturn(true);

        $result = $this->userRepository->delete($user);

        $this->assertTrue($result);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
