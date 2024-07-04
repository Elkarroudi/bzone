<?php

namespace App\Http\Middleware\auth;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NotAuthenticated extends BaseMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) { return $this->responseWithErrors("You Are Logged In, You Can Not Make This Request !"); }
        return $next($request);
    }
}
