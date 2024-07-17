<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Http\Controllers\Controller;
use App\Services\Contracts\Auth\RegistrationServiceInterface;
use App\Services\Implementations\Auth\RegistrationService;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{

    protected RegistrationServiceInterface $registrationService;
    public function __construct(RegistrationServiceInterface $registrationService)
    { $this->registrationService = $registrationService; }


    public function registerUser(Request $request, $userType)
    { return $this->registrationService->registerUser($request, $userType); }

    public function registerBasicUser(Request $request)
    { return $this->registrationService->registerBasicUser($request); }

}
