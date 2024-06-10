<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testRegister()
    {
        $data = [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        $response = $this->postJson('/api/auth/register', $data);

        $response->assertStatus(201);
        $this->assertDatabaseHas('users', ['email' => $data['email']]);
    }

    public function testAuthenticate()
    {
        $password = 'password';
        $user = User::factory()->create([
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make($password),
        ]);

        $data = [
            'email' => $user->email,
            'password' => $password,
        ];

        $response = $this->postJson('/api/auth/login', $data);

        $response->assertStatus(200);
        $this->assertAuthenticatedAs($user);
    }

    public function testLogout()
    {
        $password = 'password';
        $user = User::factory()->create([
            'password' => Hash::make($password),
        ]);

        Sanctum::actingAs($user, ['*']); // Configura o usuário autenticado usando Sanctum

        $response = $this->postJson('/api/auth/logout');

        $response->assertStatus(200);

        // Verificar se o token foi revogado
        $this->assertDatabaseMissing('personal_access_tokens', [
            'tokenable_id' => $user->id,
            'tokenable_type' => User::class,
        ]);
    }
}
