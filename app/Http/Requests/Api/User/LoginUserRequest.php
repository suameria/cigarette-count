<?php

namespace App\Http\Requests\Api\User;

use App\Http\Requests\Api\ApiRequest;
use App\Repositories\Api\User\UserRepositoryInterface;
use App\Rules\ExistModel;
use App\Rules\Password;

class LoginUserRequest extends ApiRequest
{
    private $user;

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $userRepository = app()->make(UserRepositoryInterface::class);
        // ユーザー取得
        $this->user = $userRepository->getByEmail($this->email);

        $rules = [
            'email' => [
                'required',
                'string',
                'email',
                // メールアドレスが存在しない ユーザーには正しく入力するように促す
                new ExistModel($this->user, 'Please enter your e-mail address correctly'),
            ],
        ];

        // ユーザーが存在する場合パスワードのバリデーション追加
        if (!empty($this->user)) {
            $rules = array_merge($rules, [
                'password' => ['required', 'string', new Password($this->user)],
            ]);
        }

        return $rules;
    }

    protected function passedValidation(): void
    {
        $accessToken = explode('|', $this->user->createToken($this->email)->plainTextToken)[1];

        $this->merge([
            'accessToken' => $accessToken,
        ]);
    }
}
