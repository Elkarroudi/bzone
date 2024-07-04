<?php

namespace App\Http\Middleware\auth;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAuthenticated extends BaseMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) { return $next($request); }
        return $this->responseWithErrors("Unauthenticated");
    }
}
