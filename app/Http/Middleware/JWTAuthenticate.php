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
        $level = $request->get('level');
        $section = $request->get('section');
        /*
         * Pass special entry level routes without authentication
         */
        if (
            ($path === 'api/business-option' && $level === 'getting-started' && $section === 'business-category') ||
            ($path === 'api/business-option' && $level === 'getting-started' && $section === 'about-you')
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
