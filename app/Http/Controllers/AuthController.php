<?php

namespace App\Http\Controllers;

use App\Factories\Contracts\AuthCredentialsDTOFactoryInterface;
use App\Factories\Contracts\LogoutDTOFactoryInterface;
use App\Factories\Contracts\RegisterUserDTOFactoryInterface;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\LogoutRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\Contracts\AuthServiceInterface;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Info(
 *     title="Auth API",
 *     version="1.0"
 * )
 * @OA\SecurityScheme(
 *     type="http",
 *     description="Use a Bearer token to authenticate",
 *     name="Authorization",
 *     in="header",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     securityScheme="bearerAuth",
 * )
 */
class AuthController extends Controller
{
    protected AuthServiceInterface $authService;
    protected RegisterUserDTOFactoryInterface $registerUserDTOFactory;
    protected AuthCredentialsDTOFactoryInterface $authCredentialsDTOFactory;
    protected LogoutDTOFactoryInterface $logoutDTOFactory;

    public function __construct(
        AuthServiceInterface $authService,
        RegisterUserDTOFactoryInterface $registerUserDTOFactory,
        AuthCredentialsDTOFactoryInterface $authCredentialsDTOFactory,
        LogoutDTOFactoryInterface $logoutDTOFactory
    ) {
        $this->authService = $authService;
        $this->registerUserDTOFactory = $registerUserDTOFactory;
        $this->authCredentialsDTOFactory = $authCredentialsDTOFactory;
        $this->logoutDTOFactory = $logoutDTOFactory;
    }

    /**
     * @OA\Post(
     *     path="/api/auth/register",
     *     tags={"Auth"},
     *     summary="Register a new user",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/RegisterRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="User registered successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="user", type="object", ref="#/components/schemas/User")
     *         )
     *     ),
     *     @OA\Response(response=422, description="Validation error")
     * )
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $registerUserDTO = $this->registerUserDTOFactory->createFromRequest($request);
        $user = $this->authService->register($registerUserDTO);

        return response()->json(['user' => $user], 201);
    }

    /**
     * @OA\Post(
     *     path="/api/auth/login",
     *     tags={"Auth"},
     *     summary="Login a user",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/LoginRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="User logged in successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="user", type="object", ref="#/components/schemas/User"),
     *             @OA\Property(property="token", type="string")
     *         )
     *     ),
     *     @OA\Response(response=401, description="Unauthorized")
     * )
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $authCredentialsDTO = $this->authCredentialsDTOFactory->createFromRequest($request);
        $user = $this->authService->authenticate($authCredentialsDTO);

        if (!$user) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['user' => $user, 'token' => $token], 200);
    }

    /**
     * @OA\Post(
     *     path="/api/auth/logout",
     *     tags={"Auth"},
     *     summary="Logout a user",
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="User logged out successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Successfully logged out")
     *         )
     *     )
     * )
     */
    public function logout(LogoutRequest $request): JsonResponse
    {
        $logoutDTO = $this->logoutDTOFactory->createFromRequest($request);
        $this->authService->logout($logoutDTO);

        return response()->json(['message' => 'Successfully logged out'], 200);
    }
}
