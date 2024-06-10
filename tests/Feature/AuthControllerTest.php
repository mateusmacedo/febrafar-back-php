<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_register_user(): void
    {
        $data = [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        $response = $this->postJson('/api/auth/register', $data);

        $response->assertStatus(201)
            ->assertJsonStructure(['user' => ['id', 'name', 'email']]);
    }

    public function test_login_user(): void
    {
        /**
         * @var User $user
         */
        $user = User::factory()->create([
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'),
        ]);

        $data = [
            'email' => $user->email,
            'password' => 'password',
        ];

        $response = $this->postJson('/api/auth/login', $data);

        $response->assertStatus(200)
            ->assertJsonStructure(['token']);
    }

    public function test_logout_user(): void
    {
        /**
         * @var User $user
         */
        $user = User::factory()->create();
        /**
         * @var \Laravel\Sanctum\NewAccessToken $token
         */
        $token = $user->createToken('auth_token');
        $textToken = $token->plainTextToken;

        $response = $this->postJson('/api/auth/logout', [], [
            'Authorization' => "Bearer $textToken",
        ]);

        $response->assertStatus(200)
            ->assertJson(['message' => 'Logged out successfully']);
    }
}
