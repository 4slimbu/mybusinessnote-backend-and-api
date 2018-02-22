<?php


namespace App\Libraries;


class ResponseLibrary
{
    public static function validationError($exception) {
        $errors = $exception->errors();
        // Default error returns multiple errors for each field in an array.
        // Let's simplify that to return only the first error for each field as string instead.
        $simplified_errors = [];
        foreach ($errors as $key => $value) {
            $simplified_errors[$key] = $value[0];
        }

        return response()->json([
            'errorId' => uniqid(),
            'errorCode' => 'VALIDATION_FAILED',
            'errorMessage' => $exception->getMessage(),
            'errors' => $simplified_errors
        ], 422);
    }

    public static function error($errorCode, $statusCode, $exception)
    {
        return response()->json([
            'errorId' => uniqid(),
            'errorCode' => $errorCode,
            'errorMessage' => $exception->getMessage()
        ], $statusCode);
    }
}