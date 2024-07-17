<?php

namespace App\Repositories\Contracts\Auth;

interface RegistrationRepositoryInterface
{
    public function registration($userInformation, $additionalUserInformation, $model);
}
