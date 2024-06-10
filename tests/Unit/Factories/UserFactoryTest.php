<?php

namespace Tests\Unit\Factories;

use App\DTO\Auth\RegisterUserDTO;
use App\Factories\UserFactory;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;


class UserFactoryTest extends TestCase
{
    /**
     * Test the createFromDTO method.
     */
    public function test_create_from_dto(): void
    {
        $userFactory = new UserFactory();

        $registerUserDTO = new RegisterUserDTO(
            'Test User',
            'test@email.com',
            'password123',
        );

        $user = $userFactory->createFromDTO($registerUserDTO);

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals($registerUserDTO->name, $user->name);
        $this->assertEquals($registerUserDTO->email, $user->email);
        $this->assertTrue(Hash::check($registerUserDTO->password, $user->password));
    }
}
