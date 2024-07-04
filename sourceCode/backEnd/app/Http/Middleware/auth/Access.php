<?php

namespace App\Http\Middleware\auth;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Access extends BaseMiddleware
{
    public function handle(Request $request, Closure $next, $userType): Response
    {
        if (auth()->check() && auth()->user()->type === $userType)
        { return $next($request); }

        return $this->responseWithErrors("Unauthorized To Make This Request, Sorry !!");
    }
}
