<?php

namespace App\Repositories\Api\User;

use App\Models\User;

interface UserRepositoryInterface
{
    public function store(array $request): User;
}
