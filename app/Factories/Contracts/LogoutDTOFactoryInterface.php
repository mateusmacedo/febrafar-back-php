<?php

namespace App\Factories\Contracts;

use App\DTO\Auth\LogoutDTO;
use Illuminate\Http\Request;

interface LogoutDTOFactoryInterface
{
    /**
     * Create a LogoutDTO from a request.
     *
     * @param Request $request
     * @return LogoutDTO
     */
    public function createFromRequest(Request $request): LogoutDTO;
}
