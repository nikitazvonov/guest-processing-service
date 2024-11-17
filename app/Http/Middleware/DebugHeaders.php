<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DebugHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $start = microtime(true);

        $response = $next($request);

        $end = microtime(true);

        $executionTime = round(($end - $start) * 1000, 2);
        $memoryUsage = round(memory_get_peak_usage() / 1024, 2);

        $response->headers->set('X-Debug-Time', $executionTime.' ms');
        $response->headers->set('X-Debug-Memory', $memoryUsage.' kb');

        return $response;
    }
}
