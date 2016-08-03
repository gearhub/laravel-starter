<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;

class AuthenticateJwt
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = JWTAuth::setRequest($request)->parseToken()->authenticate();

        if (!$user) {
            throw new \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException('Access denied. Authenticated user not found.');
        }

        return $next($request);
    }
}
