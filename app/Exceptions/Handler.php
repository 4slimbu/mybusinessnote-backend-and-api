<?php

namespace App\Exceptions;

use App\Libraries\ResponseLibrary;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
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
     * @param  \Illuminate\Http\Request $request
     * @param  \Exception $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        // Response For Api
        if ($request->expectsJson()) {

            if ($exception instanceof MultipleBusinessException) {
                return ResponseLibrary::error('ERR_MULTIPLE_BUSINESS', 400, $exception);
            }

            if ($exception instanceof SaveImageException) {
                return ResponseLibrary::error('ERR_SAVE_IMAGE', 500, $exception);
            }

            if ($exception instanceof InvalidImageException) {
                return ResponseLibrary::error('ERR_INVALID_IMAGE', 400, $exception);
            }

            if ($exception instanceof QueryException) {
                return ResponseLibrary::error('ERR_DATABASE', 500, $exception);
            }
            // Method Not Allowed Exception
            if ($exception instanceof MethodNotAllowedHttpException) {
                return ResponseLibrary::error('ERR_METHOD_NOT_ALLOWED', 405, $exception);
            }

            // Model Not Found Exception
            if ($exception instanceof ModelNotFoundException) {
                return ResponseLibrary::error('ERR_MODEL_NOT_FOUND', 400, $exception);
            }

            // Invalid Request
            if ($exception instanceof InvalidRequestException) {
                return ResponseLibrary::error('ERR_INVALID_REQUEST', 400, $exception);
            }

            // Invalid Credentials
            if ($exception instanceof InvalidCredentialException) {
                return ResponseLibrary::error('ERR_INVALID_CREDENTIALS', 401, $exception);
            }

            // Validation Exception
            if ($exception instanceof ValidationException) {
                return ResponseLibrary::validationError('ERR_VALIDATION_FAILED', 422, $exception);
            }

            // JWT Exceptions
            if ($exception instanceof TokenExpiredException) {
                return ResponseLibrary::error('ERR_TOKEN_EXPIRED', 401, $exception);
            } else if ($exception instanceof TokenInvalidException) {
                return ResponseLibrary::error('ERR_TOKEN_INVALID', 400, $exception);
            } else if ($exception instanceof JWTException) {
                return ResponseLibrary::error('ERR_TOKEN', 500, $exception);
            }

            // Unknown Exception
            return ResponseLibrary::error('ERR_UNKNOWN', 500, $exception);
        }

        // Response for Web
        return parent::render($request, $exception);
    }
}
