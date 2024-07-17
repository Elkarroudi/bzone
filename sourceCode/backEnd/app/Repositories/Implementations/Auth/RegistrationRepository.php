<?php

namespace App\Repositories\Implementations\Auth;

use App\Models\Admin;
use App\Models\Client;
use App\Models\Coach;
use App\Models\Employee;
use App\Models\Manager;
use App\Models\Owner;
use App\Models\User;
use App\Repositories\Contracts\Auth\RegistrationRepositoryInterface;

class RegistrationRepository implements RegistrationRepositoryInterface
{

    public function registration($userInformation, $additionalUserInformation, $model)
    {
        $user = User::create($userInformation);
        $model::create([
            'user_id' => $user->id,
            ...$additionalUserInformation,
        ]);

        return $user;
    }
}
