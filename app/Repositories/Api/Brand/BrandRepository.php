<?php

namespace App\Repositories\Api\Brand;

use App\Models\Brand;

class BrandRepository implements BrandRepositoryInterface
{
    private $brand;

    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }

    public function getList()
    {
        return $this->brand->query()->get();
    }

    public function create(array $request)
    {
        $this->brand->query()->create([
            'name' => $request['name'],
            'price' => $request['price'],
        ]);
    }

    public function updateById(int $id, array $request)
    {
        $this->brand->query()->updateOrCreate(
            [
                'id' => $id
            ],
            [
                'name' => $request['name'],
                'price' => $request['price'],
            ]
        );
    }
}
