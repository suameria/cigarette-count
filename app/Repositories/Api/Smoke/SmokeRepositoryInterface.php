<?php

namespace App\Repositories\Api\Smoke;

use Illuminate\Database\Eloquent\Collection;

interface SmokeRepositoryInterface
{
    public function getHistoryByDate(string $from, string $to): Collection;

    public function store(array $request);

    public function updateByIdBrandIdUserId(int $id, array $request);
}
