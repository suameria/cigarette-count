<?php

namespace App\Repositories\Api\User;

use App\Models\User;

interface UserRepositoryInterface
{
    /**
     * メールアドレスからユーザーを取得
     *
     * @param  string $email
     * @return User
     */
    public function getByEmail(string $email): User|null;

    /**
     * 保存
     *
     * @param  array $request
     * @return User
     */
    public function store(array $request): User;
}
