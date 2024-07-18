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


    public function registerAdminUser(Request $request)
    {return $this->registrationService->registerUser($request, 'admin');}

    public function registerManagerUser(Request $request)
    {return $this->registrationService->registerUser($request, 'manager');}

}
