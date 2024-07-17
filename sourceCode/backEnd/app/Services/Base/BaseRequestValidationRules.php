<?php

namespace App\Services\Base;

class BaseRequestValidationRules
{

    protected array $BaseUserValidationRules = [
        'first_name' => "required",
        'last_name' => "required",
        'email' => ['required', 'email', 'unique:users,email'],
        'phone' => "required|numeric",
        'password' => "required|min:6|max:50",
    ];

    protected array $BaseAddressValidation = ['address' => "required", ];


    public function getBaseUserValidationRules(): array
    { return $this->BaseUserValidationRules; }

    public function getUserValidationRules(): array
    { return [...$this->BaseUserValidationRules, ...$this->BaseAddressValidation]; }
}
