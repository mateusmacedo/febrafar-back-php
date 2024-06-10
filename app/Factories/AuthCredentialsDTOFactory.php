<?php

namespace App\Factories;

use App\DTO\Auth\AuthCredentialsDTO;
use App\Factories\Contracts\AuthCredentialsDTOFactoryInterface;
use Illuminate\Http\Request;

/**
 * Class AuthCredentialsDTOFactory
 * @package App\Factories
 */
class AuthCredentialsDTOFactory implements AuthCredentialsDTOFactoryInterface
{
    /**
     * Create an AuthCredentialsDTO from a request.
     *
     * @param Request $request
     * @return AuthCredentialsDTO
     */
    public function createFromRequest(Request $request): AuthCredentialsDTO
    {
        return new AuthCredentialsDTO(
            $request->input('email'),
            $request->input('password')
        );
    }
}
