<?php

namespace App\Http\Requests\Api\User;

use App\Http\Requests\Api\ApiRequest;
use App\Models\User;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            // 最低8文字の英数字
            'password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()],
        ];
    }
}
