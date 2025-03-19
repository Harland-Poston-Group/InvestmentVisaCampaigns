<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogIncomingRequests
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        \Log::channel('requestlog')->info('Request Info', [
            'ip' => $request->ip(),
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'user_agent' => $request->userAgent(),
            'time' => now()
        ]);

        return $next($request);
    }
}
