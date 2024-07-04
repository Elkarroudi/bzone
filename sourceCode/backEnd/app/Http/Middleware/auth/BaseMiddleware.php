<?php

namespace App\Http\Middleware\auth;

use Illuminate\Http\JsonResponse;

class BaseMiddleware
{
    function responseWithErrors($message): JsonResponse
    {
        return response()->json([
            'status' => false,
            'errors' => $message,
        ]);
    }
}
