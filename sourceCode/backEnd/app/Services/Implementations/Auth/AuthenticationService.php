<?php

namespace App\Services\Implementations\Auth;

use App\Mail\OtpMail;
use App\Models\User;
use App\Services\Base\BaseRequestValidation;
use App\Services\BaseService;
use App\Services\Contracts\Auth\AuthenticationServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthenticationService extends BaseService implements AuthenticationServiceInterface
{

    protected BaseRequestValidation $baseRequestValidation;
    public function __construct()
    { $this->baseRequestValidation = new BaseRequestValidation(); }



    public function login(Request $request)
    {
        $requestValidationRules = ['email' => 'required|email', 'password' => "required|min:6|max:50", ];
        if ($this->baseRequestValidation->checkRequestMethod($request, 'POST')) {return $this->incorrectHttpMethod();}

        $response = $this->baseRequestValidation->validateRequest($request, $requestValidationRules);
        if ($response['status']) {

            $credentials = ['email' => $response['data']['email'], 'password' => $response['data']['password']];
            if ($token = auth()->attempt($credentials)) {

                if (auth()->user()->two_step_verification) {

                    $otpCode = mt_rand(11111111, 99999999);
                    DB::table('otps')->insert([
                        'id' => uniqid(),
                        'user_id' => auth()->id(),
                        'email' => auth()->user()->email,
                        'otp' => $otpCode,
                        'purpose' => 'this otp was requested for authentication',
                    ]);

                    Mail::to($response['data']['email'])->send(new OtpMail($otpCode));
                    return $this->responseWithSuccess([
                        'email' => $response['data']['email'],
                        'message' => 'An OTP verification code was send to your email to verify your identity',
                    ]);
                }
                return $this->responseWithToken($token);
            }
            return $this->responseWithErrors("Unauthorized");
        }
        return $response;
    }

    public function otpVerification(Request $request) {
        $requestValidationRules = ['email' => 'required|email', 'otp' => "required|min:8|max:8", ];
        if ($this->baseRequestValidation->checkRequestMethod($request, 'POST')) {return $this->incorrectHttpMethod();}

        $response = $this->baseRequestValidation->validateRequest($request, $requestValidationRules);
        if ($response['status']) {

            $otpExists = DB::table('otps')->where('email', $response['data']['email'])->where('otp', $response['data']['otp']);

            if ($otpExists->exists()) {
                $otpExists->delete();
                $token = JWTAuth::fromUser(User::where('email', $response['data']['email'])->first());
                return $this->responseWithToken($token);
            }

            return $this->responseWithErrors('Code Not Valid !');
        }
        return $response;
    }

    public function refresh(Request $request)
    {
        if ($this->baseRequestValidation->checkRequestMethod($request, 'POST')) {return $this->incorrectHttpMethod();}

        $newRefreshToken = auth()->refresh();
        return $this->responseWithToken($newRefreshToken);
    }

    public function logout(Request $request)
    {
        if ($this->baseRequestValidation->checkRequestMethod($request, 'POST')) {return $this->incorrectHttpMethod();}

        auth()->logout();
        return $this->responseWithSuccess("Successfully logged out");
    }

    public function responseWithToken($token): \Illuminate\Http\JsonResponse
    {
        return $this->responseWithSuccess([
            "token" => $token,
            "token_type" => 'bearer',
            "token_expire_in" => auth()->factory()->getTTL() * 60,
            "user_type" => auth()->user()->type,
        ]);
    }

}
