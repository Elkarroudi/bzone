<?php

namespace App\Services\Contracts\Auth;

use Illuminate\Http\Request;

interface AuthenticationServiceInterface
{
    public function login(Request $request);
    public function otpVerification(Request $request);
    public function refresh(Request $request);
    public function logout(Request $request);
    public function responseWithToken($token);
}
