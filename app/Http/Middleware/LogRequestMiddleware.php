<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * Class LogRequestMiddleware
 * @package App\Http\Middleware
 */
class LogRequestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $requestId = uniqid('', true);
        $request->headers->set('X-Request-Id', $requestId);

        Log::info("Request {$requestId} started", ['request' => $request->all()]);

        $response = $next($request);

        Log::info("Request {$requestId} finished", ['response' => $response]);

        return $response;
    }
}
