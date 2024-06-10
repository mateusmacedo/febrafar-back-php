<?php

namespace App\Factories;

use App\DTO\Auth\LogoutDTO;
use App\Factories\Contracts\LogoutDTOFactoryInterface;
use Illuminate\Http\Request;

/**
 * Class LogoutDTOFactory
 * @package App\Factories
 */
class LogoutDTOFactory implements LogoutDTOFactoryInterface
{
    /**
     * Create a LogoutDTO from a request.
     *
     * @param Request $request
     * @return LogoutDTO
     */
    public function createFromRequest(Request $request): LogoutDTO
    {
        return new LogoutDTO($request->user());
    }
}
