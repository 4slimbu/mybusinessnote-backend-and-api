<?php

namespace App\Exceptions;

use App\Libraries\ResponseLibrary;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception $exception
     * @return void
     * @throws Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        // Response For Api
        if ($request->expectsJson()) {

            // Model Not Found Exception
            if ($exception instanceof ModelNotFoundException) {
                return ResponseLibrary::error('MODEL_NOT_FOUND', 400, $exception);
            }

            // Validation Exception
            if ($exception instanceof ValidationException) {
                return ResponseLibrary::validationError($exception);
            }

            // JWT Exceptions
            if ($exception instanceof TokenExpiredException) {
                return ResponseLibrary::error('TOKEN_EXPIRED', 401, $exception);
            } else if ($exception instanceof TokenInvalidException) {
                return ResponseLibrary::error('TOKEN_INVALID', 400, $exception);
            } else if ($exception instanceof JWTException) {
                return ResponseLibrary::error('TOKEN_ERROR', 500, $exception);
            }

            // Unknown Exception
            return ResponseLibrary::error('UNKNOWN_ERROR', 500, $exception);
        }

        // Response for Web
        return parent::render($request, $exception);
    }
}
