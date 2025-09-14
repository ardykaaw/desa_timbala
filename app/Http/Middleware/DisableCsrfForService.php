<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DisableCsrfForService
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Disable CSRF verification for service submission
        if ($request->is('layanan/submit') || $request->is('test/service-submit') || $request->is('api/service-submit')) {
            $request->setLaravelSession($request->getSession());
            return $next($request);
        }
        
        return $next($request);
    }
}
