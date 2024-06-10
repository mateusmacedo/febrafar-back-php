<?php

namespace App\Services;

use App\DTO\Auth\AuthCredentialsDTO;
use App\DTO\Auth\RegisterUserDTO;
use App\Factories\Contracts\UserFactoryInterface;
use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\Contracts\AuthServiceInterface;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

/**
 * Class AuthService
 * @package App\Services
 */
class AuthService implements AuthServiceInterface
{
    protected UserRepositoryInterface $userRepository;
    protected UserFactoryInterface $userFactory;

    public function __construct(UserRepositoryInterface $userRepository, UserFactoryInterface $userFactory)
    {
        $this->userRepository = $userRepository;
        $this->userFactory = $userFactory;
    }

    public function register(RegisterUserDTO $registerUserDTO): User
    {
        $user = $this->userFactory->createFromDTO($registerUserDTO);
        return $this->userRepository->save($user);
    }

    public function authenticate(AuthCredentialsDTO $authCredentialsDTO): ?User
    {
        if (Auth::attempt(['email' => $authCredentialsDTO->email, 'password' => $authCredentialsDTO->password])) {
            return Auth::user();
        }

        return null;
    }

    public function logout(User $user): void
    {
        $token = $user->currentAccessToken();
        if ($token instanceof PersonalAccessToken) {
            $token->delete();
        }
    }
}
