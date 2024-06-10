<?php

namespace App\Factories\Contracts;

use App\DTO\Auth\RegisterUserDTO;
use Illuminate\Http\Request;

interface RegisterUserDTOFactoryInterface
{
    /**
     * Create a RegisterUserDTO from Request.
     * @param Request $request
     * @return RegisterUserDTO
     */
    public function createFromRequest(Request $request): RegisterUserDTO;
}
