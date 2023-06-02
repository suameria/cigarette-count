<?php

namespace App\Services\Api\Smoke;

interface SmokeServiceInterface
{
    /**
     * 喫煙本数履歴作成
     *
     * @param  array $request
     * @return array
     */
    public function createHistories(array $request): array;
}
