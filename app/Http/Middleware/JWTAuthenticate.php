<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;

class JWTAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $path = $request->path();
        /*
         * Pass special entry level routes without authentication
         */
        if (
            ($path === 'api/business-option/1') ||
            ($path === 'api/business-option/2') ||
            ($path === 'api/business-option/3')
        ) {
            //pass without authentication
        } else {
            $token = JWTAuth::getToken();
            //TODO: user need to be verified and have proper permission to access various sections
            // so need to create scope and add it to token
            JWTAuth::authenticate($token);
        }

        return $next($request);
    }
}
