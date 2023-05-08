<?php

namespace App\Repositories\Api\Smoke;

interface SmokeRepositoryInterface
{
    public function getHistoryByDate(string $from, string $to);

    public function store(array $request);

    public function updateByIdBrandIdUserId(int $id, array $request);
}
