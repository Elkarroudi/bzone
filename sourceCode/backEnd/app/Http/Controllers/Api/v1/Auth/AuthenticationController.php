<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Http\Controllers\Controller;
use App\Services\Contracts\Auth\AuthenticationServiceInterface;
use App\Services\Implementations\Auth\AuthenticationService;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{

    protected AuthenticationServiceInterface $authenticationService;
    public function __construct(AuthenticationServiceInterface $authenticationService)
    { $this->authenticationService = $authenticationService; }


    public function login(Request $request)
    { return $this->authenticationService->login($request); }

    public function otpVerification(Request $request)
    { return $this->authenticationService->otpVerification($request); }

    public function refresh(Request $request)
    { return $this->authenticationService->refresh($request); }

    public function logout(Request $request)
    { return $this->authenticationService->logout($request); }
}
