<?php

namespace App\Repositories\Api\Brand;

interface BrandRepositoryInterface
{
    public function getList();

    public function create(array $request);

    public function updateById(int $id, array $request);
}
