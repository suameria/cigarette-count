<?php

namespace App\Repositories\Api\Smoke;

use App\Models\Smoke;

class SmokeRepository implements SmokeRepositoryInterface
{
    private $smoke;

    public function __construct(Smoke $smoke)
    {
        $this->smoke = $smoke;
    }

    public function getList()
    {
        return $this->smoke->query()->get();
    }

    public function create(array $request)
    {
        $this->smoke->query()->create([
            'name' => $request['name'],
            'price' => $request['price'],
        ]);
    }

    public function updateById(int $id, array $request)
    {
        $this->smoke->query()->updateOrCreate(
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
