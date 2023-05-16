<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthenticatedController extends Controller
{
    public function login(Request $request)
    {
        // @todo バリデーションかけること
        $user = User::query()->where('email', $request->email)->first();

        $token = $user->createToken($user->id);

        return [
            'accessToken' => $token->plainTextToken,
        ];
    }
}
