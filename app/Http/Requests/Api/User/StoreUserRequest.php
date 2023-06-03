<?php

namespace App\Http\Requests\Api\User;

use App\Http\Requests\Api\ApiRequest;
use App\Models\User;
use App\Repositories\Api\User\UserRepositoryInterface;
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

    protected function passedValidation(): void
    {
        $userRepository = app()->make(UserRepositoryInterface::class);
        // ユーザー保存
        $user = $userRepository->store($this->all());

        $accessToken = explode('|', $user->createToken($this->email)->plainTextToken)[1];

        $this->merge([
            'accessToken' => $accessToken,
        ]);
    }
}
