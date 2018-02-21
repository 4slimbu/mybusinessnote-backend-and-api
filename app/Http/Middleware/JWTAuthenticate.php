<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
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
        dd($request->path());
        if (
            $request->path() === 'api/level/1/section/3/business-option/4' ||
            $request->path() === '' ||
            $request->path() === '' ||
            $request->path() === ''
        ) {
            //pass without authentication
        } else {
            $token = JWTAuth::getToken();
            JWTAuth::authenticate($token);
        }

        return $next($request);
    }
}
