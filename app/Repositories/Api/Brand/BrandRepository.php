<?php

namespace App\Repositories\Api\Brand;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BrandRepository implements BrandRepositoryInterface
{
    private $brand;

    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }

    public function getByUserId(int $userId): Collection
    {
        return $this->brand->query()
            ->select([
                'id',
                'name',
                'price',
                'number',
                'created_at',
                'updated_at',
            ])
            ->where('user_id', $userId)
            ->get();
    }

    public function findByIdUserId(int $id, int $userId): Model
    {
        return $this->brand->query()
            ->select([
                'id',
                'name',
                'price',
                'number',
                'created_at',
                'updated_at',
            ])
            ->where('user_id', $userId)
            ->findOrFail($id);
    }

    public function store(array $request): void
    {
        $this->brand->query()->create([
            'user_id' => $request['user_id'],
            'name'    => $request['name'],
            'price'   => $request['price'],
            'number'  => $request['number'],
        ]);
    }

    public function updateByIdUserId(int $id, int $userId, array $request): void
    {
        // 該当レコード取得
        $query = $this->brand->query()
            ->where('user_id', $userId)
            ->findOrFail($id);

        // 更新
        $query->update([
            'name'    => $request['name'],
            'price'   => $request['price'],
            'number'  => $request['number'],
        ]);
    }

    public function deleteByIdUserId(int $id, int $userId): void
    {
        $this->brand->query()
            ->where('id', $id)
            ->where('user_id', $userId)
            ->delete();
    }
}
