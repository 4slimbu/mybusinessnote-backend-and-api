<?php

namespace App\Exceptions;

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
        if ($request->expectsJson()) {
//            dd($exception);
            if ($exception instanceof ModelNotFoundException) {
                return response()->json([
                    'error_code' => $exception->getMessage()
                ], 400);
            }

            if ($exception instanceof ValidationException) {
                $errors = $exception->errors();
                // Default error returns multiple errors for each field in an array.
                // Let's simplify that to return only the first error for each field as string instead.
                $simplified_errors = [];
                foreach ($errors as $key => $value) {
                    $simplified_errors[$key] = $value[0];
                }

                return response()->json([
                    'error_code' => 'validation_failed',
                    'errors' => $simplified_errors
                ], 422);
            }

            // JWT Exceptions
            if ($exception instanceof TokenExpiredException) {
                return response()->json(['token_expired'], $exception->getStatusCode());
            } else if ($exception instanceof TokenInvalidException) {
                return response()->json(['token_invalid'], $exception->getStatusCode());
            } else if ($exception instanceof JWTException) {
                return response()->json(['token_not_available'], $exception->getStatusCode());
            }


            return response()->json([
                'error_code' => $exception->getMessage()
            ], 500);
        }

        return parent::render($request, $exception);
    }
}
