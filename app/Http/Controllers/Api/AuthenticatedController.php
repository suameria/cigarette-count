<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;

class AuthenticatedController extends Controller
{
    public function login(LoginRequest $request)
    {
        return [
            'accessToken' => $request->accessToken,
        ];
    }
}
