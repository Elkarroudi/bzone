<?php

namespace App\Services\Base;

use App\Services\BaseService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class BaseRequestValidation
{

    // Global Request Validation Function
    public function validateRequest(Request $request, $validationRules): array
    {
        try {
            $validatedData = $request->validate($validationRules);
        }
        catch (ValidationException $validationException) {
            return $this->requestResponse(false, 'errors', $validationException->validator->errors()->all());
        }

        return $this->requestResponse(true, 'data', $validatedData);
    }

    public function checkRequestMethod(Request $request, $methodNeeded): bool
    {
        if (!$request->isMethod($methodNeeded)) { return true; }
        return false;
    }

    public function requestResponse($status, $messageType, $message): array
    { return ['status' => $status, $messageType => $message, ]; }
}
