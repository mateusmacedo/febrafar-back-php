<?php

namespace App\Factories;

use App\DTO\Auth\RegisterUserDTO;
use App\Factories\Contracts\RegisterUserDTOFactoryInterface;
use Illuminate\Http\Request;

/**
 * Class RegisterUserDTOFactory
 * @package App\Factories
 */
class RegisterUserDTOFactory implements RegisterUserDTOFactoryInterface
{
    /**
     * Create a RegisterUserDTO from Request.
     * @param Request $request
     * @return RegisterUserDTO
     */
    public function createFromRequest(Request $request): RegisterUserDTO
    {
        return new RegisterUserDTO(
            $request->input('name'),
            $request->input('email'),
            $request->input('password')
        );
    }
}
