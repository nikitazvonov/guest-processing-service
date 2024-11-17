<?php

namespace App\Http\Middleware;

use App\Exceptions\Middleware\ApiKeyMismatchException;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckApiKey
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     *
     * @throws ApiKeyMismatchException
     */
    public function handle(Request $request, Closure $next): Response
    {
        $apiKey = $request->header('X_API_KEY');

        if (is_null($apiKey) || $apiKey !== config('api-authentication.api_key')) {
            throw new ApiKeyMismatchException;
        }

        return $next($request);
    }
}
