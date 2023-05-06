<?php

namespace App\Repositories\Api\Smoke;

interface SmokeRepositoryInterface
{
    public function getList();

    public function store(array $request);

    public function updateByIdBrandIdUserId(int $id, array $request);
}
