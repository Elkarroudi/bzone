<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BaseService
{
    protected function response($status, $statusName, $data): JsonResponse
    {
        return response()->json([
            'status' => $status,
            $statusName => $data
        ]);
    }

    protected function incorrectHttpMethod(): JsonResponse
    { return $this->response(false, 'errors', '(Incorrect Http Method), This HTTP Method Is Not Supported By This Route !!'); }

    protected function responseWithErrors($errors): JsonResponse
    { return $this->response(false, 'errors', $errors); }

    protected function responseWithSuccess($data): JsonResponse
    { return $this->response(true, 'data', $data); }
}
