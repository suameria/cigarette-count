<?php

namespace App\Repositories\Api\Smoke;

interface SmokeRepositoryInterface
{
    public function getList();

    public function create(array $request);

    public function updateById(int $id, array $request);
}
