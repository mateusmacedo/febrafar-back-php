<?php

namespace App\Http\Controllers;

use App\Factories\Contracts\AuthCredentialsDTOFactoryInterface;
use App\Factories\Contracts\RegisterUserDTOFactoryInterface;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\Contracts\AuthServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class AuthController
 * @package App\Http\Controllers
 */
class AuthController extends Controller
{
    protected AuthServiceInterface $authService;
    protected RegisterUserDTOFactoryInterface $registerUserDTOFactory;
    protected AuthCredentialsDTOFactoryInterface $authCredentialsDTOFactory;

    public function __construct(
        AuthServiceInterface $authService,
        RegisterUserDTOFactoryInterface $registerUserDTOFactory,
        AuthCredentialsDTOFactoryInterface $authCredentialsDTOFactory
    ) {
        $this->authService = $authService;
        $this->registerUserDTOFactory = $registerUserDTOFactory;
        $this->authCredentialsDTOFactory = $authCredentialsDTOFactory;
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        $registerUserDTO = $this->registerUserDTOFactory->createFromRequest($request);

        $user = $this->authService->register($registerUserDTO);

        return response()->json(['user' => $user], 201);
    }

    public function login(Request $request): JsonResponse
    {
        $authCredentialsDTO = $this->authCredentialsDTOFactory->createFromRequest($request);

        $user = $this->authService->authenticate($authCredentialsDTO);

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['user' => $user, 'token' => $token], 200);
    }

    public function logout(Request $request): JsonResponse
    {
        $this->authService->logout($request->user());

        return response()->json(['message' => 'Successfully logged out'], 200);
    }
}
