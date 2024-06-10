<?php

namespace App\Factories\Contracts;

use App\DTO\Auth\AuthCredentialsDTO;
use Illuminate\Http\Request;

interface AuthCredentialsDTOFactoryInterface
{
    /**
     * Create an AuthCredentialsDTO from a request.
     *
     * @param Request $request
     * @return AuthCredentialsDTO
     */
    public function createFromRequest(Request $request): AuthCredentialsDTO;
}
