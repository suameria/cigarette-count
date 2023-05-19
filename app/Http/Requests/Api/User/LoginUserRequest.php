<?php

namespace App\Http\Requests\Api\User;

use App\Http\Requests\Api\ApiRequest;
use App\Repositories\Api\User\UserRepositoryInterface;
use App\Rules\ExistEmail;
use App\Rules\Password;

class LoginUserRequest extends ApiRequest
{
    private $user;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(UserRepositoryInterface $userRepository): array
    {
        // ユーザー取得
        $this->user = $userRepository->getByEmail($this->email);

        $rules = [
            'email' => ['required', 'string', 'email', new ExistEmail($this->user)],
        ];

        // ユーザーが存在する場合パスワードのバリデーション追加
        if (!empty($this->user)) {
            $rules = array_merge($rules, [
                'password' => ['required', 'string', new Password($this->user)],
            ]);
        }

        return $rules;
    }

    /**
     * バリデーション完了後
     */
    protected function passedValidation(): void
    {
        $accessToken = explode('|', $this->user->createToken($this->email)->plainTextToken)[1];

        $this->merge([
            'accessToken' => $accessToken,
        ]);
    }
}
