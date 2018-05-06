<?php

namespace App\Http\Middleware;

use Closure;
use function config;

class SignatureMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param string $headerName
     * @return mixed
     */
    public function handle($request, Closure $next, $headerName = 'X-name')
    {
        $response = $next($request);
        $response->headers->set($headerName, config('app.name'));
        return $response;
    }
}