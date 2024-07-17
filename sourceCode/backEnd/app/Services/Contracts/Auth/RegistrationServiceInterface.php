<?php

namespace App\Services\Contracts\Auth;

use Illuminate\Http\Request;

interface RegistrationServiceInterface
{
    public function registerBasicUser(Request $request);
    public function registerUser(Request $request, $userType);


    public function verifyUserInformationBeforeRegistration(Request $request, $userType, $requestValidationRules);
    public function register(Request $request, $userInformation, $userType);
}
