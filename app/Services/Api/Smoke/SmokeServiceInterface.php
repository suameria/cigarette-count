<?php

namespace App\Services\Api\Smoke;

interface SmokeServiceInterface
{
    public function getHistories(array $request): array;
}
