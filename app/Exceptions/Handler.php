<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
    public function register(): void
    {
        
    }

    public function render($request, Throwable $e)
    {
        if ($e instanceof ValidationException) {
            return response()->json([
                'message' => 'Dados inválidos',
                'errors' => $e->errors(),
            ], 422);
        }

        return parent::render($request, $e);
    }
}