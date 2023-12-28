<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof AuthenticationException) {
            return $this->generateExceptionErrorResponse($exception, 401);
        }

        if ($exception instanceof ValidationException) {
            return $this->generateExceptionErrorResponse($exception, 422, $request);
        }

        if ($exception instanceof QueryException) {
            // Custom response for QueryException
            return response()->json(['error' => 'Query Exception'], 500);
        }

        if ($exception instanceof ModelNotFoundException) {
            // Custom response for ModelNotFoundException
            return response()->json(['error' => 'Model not found'], 404);
        }

        // Handle other exceptions or errors here
        // For example, you can check for other types of exceptions and return appropriate responses

        return parent::render($request, $exception);
    }

    private function generateExceptionErrorResponse(Throwable $exception, int $status)
    {
        return response()->customJson(
            [
                'message' => $exception->getMessage(),
                'errors' => (isset($exception->validator)) ? $exception->validator->errors()->toArray() : array(),
                'line' => $exception->getLine(),
                'file' => $exception->getFile(),
                'code' => $exception->getCode(),
                'previous' => $exception->getPrevious(),
                'trace' => $exception->getTrace(),
            ],
            $exception->getMessage(),
            $status
        );
    }
}
