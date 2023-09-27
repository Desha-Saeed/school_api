<?php

namespace App\Traits;


trait ApiResponse
{
    public function apiResponse($data = [], $message = null, $status = null)

    {
        return response([
            'success' => true,
            'data' => $data,
            'message' => $message,
        ], $status);
    }
}
