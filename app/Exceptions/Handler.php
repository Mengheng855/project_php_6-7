<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Throwable;

class Handler extends ExceptionHandler
{
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register(): void
    {
        // 👇 handle unauthenticated
        $this->renderable(function (AuthenticationException $e, $request) {
            if ($request->is('api/*')) {
                return apiResponse(null, 401, 'Unauthenticated. Please login.');
            }
        });

        // 👇 handle validation errors
        $this->renderable(function (ValidationException $e, $request) {
            if ($request->is('api/*')) {
                return apiResponse($e->errors(), 422, 'Validation failed');
            }
        });

        // 👇 handle too many attempts
        $this->renderable(function (ThrottleRequestsException $e, $request) {
            if ($request->is('api/*')) {
                $seconds = $e->getHeaders()['Retry-After'];
                return apiResponse(null, 429, "Too many attempts. Try again in {$seconds} seconds.");
            }
        });
    }
}