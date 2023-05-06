<?php

namespace App\Repositories\Api\BrandUser;

interface BrandUserRepositoryInterface
{
    public function getList();

    public function store(array $request);

    public function deleteByBrandIdUserId(int $brandId, int $userId);
}
