<?php

namespace App\Repositories\Api\User;

use App\Models\User;

interface UserRepositoryInterface
{
    public function getByEmail($email): User|null;

    public function store(array $request): User;
}
