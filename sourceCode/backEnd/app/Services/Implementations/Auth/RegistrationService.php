<?php

namespace App\Services\Implementations\Auth;

use App\Models\Admin;
use App\Models\Client;
use App\Models\Coach;
use App\Models\Employee;
use App\Models\Manager;
use App\Models\Owner;
use App\Repositories\Contracts\Auth\RegistrationRepositoryInterface;
use App\Services\Base\BaseAddress;
use App\Services\Base\BaseRequestValidation;
use App\Services\Base\BaseRequestValidationRules;
use App\Services\BaseService;
use App\Services\Contracts\Auth\RegistrationServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Mockery\Exception;

class RegistrationService extends BaseService implements RegistrationServiceInterface
{

    protected RegistrationRepositoryInterface $registrationRepository;
    protected BaseRequestValidation $baseRequestValidation;
    protected BaseRequestValidationRules $baseRequestValidationRules;
    public function __construct(RegistrationRepositoryInterface $registrationRepository)
    {
        $this->registrationRepository = $registrationRepository;
        $this->baseRequestValidation = new BaseRequestValidation();
        $this->baseRequestValidationRules = new BaseRequestValidationRules();
    }


    public function registerBasicUser(Request $request): JsonResponse|array
    {
        $requestValidationRules = [ ...$this->baseRequestValidationRules->getBaseUserValidationRules(), ];
        return $this->verifyUserInformationBeforeRegistration($request, 'client', $requestValidationRules);
    }

    public function registerUser(Request $request, $userType): JsonResponse|array
    {
        $requestValidationRules = [ ...$this->baseRequestValidationRules->getUserValidationRules(), ];

        if ($userType == 'manager') {$requestValidationRules['role'] = 'required'; }
        return $this->verifyUserInformationBeforeRegistration($request, $userType, $requestValidationRules);
    }



    public function verifyUserInformationBeforeRegistration(Request $request, $userType, $requestValidationRules): JsonResponse|array
    {
        if ($this->baseRequestValidation->checkRequestMethod($request, 'POST')) {return $this->incorrectHttpMethod();}

        $response = $this->baseRequestValidation->validateRequest($request, $requestValidationRules);
        if ($response['status']) {
            return $this->register($request, $response['data'], $userType);
        }
        return $response;
    }

    // Global Registration Function
    public function register(Request $request, $userInformation, $userType)
    {
        $userInformation['username'] = '@' . uniqid();
        $userInformation['type'] = $userType;

        if ($userType !== 'client') { $userInformation['address'] = json_encode($userInformation['address']); }

        $additionalUserInformation = [];
        $model = Client::class;

        if ($userInformation['type'] === 'admin')
        { $model = Admin::class; }

        if ($userInformation['type'] === 'manager')
        {
            $model = Manager::class;
            $admin = Admin::where('user_id', '=', auth()->id())->get();
            $additionalUserInformation['added_by'] = $admin[0]->id;
            $additionalUserInformation['role'] = $userInformation['role'];
        }

        if ($userInformation['type'] === 'owner') { $model = Owner::class; }
        if ($userInformation['type'] === 'coach') { $model = Coach::class; }
        if ($userInformation['type'] === 'employee') { $model = Employee::class; }


        $newUser = $this->registrationRepository->registration($userInformation, $additionalUserInformation, $model);
        if ($newUser)
        { return $this->responseWithSuccess("Registration Successful !"); }
        return $this->responseWithErrors("Error Registering A New " . $userType);
    }

}
