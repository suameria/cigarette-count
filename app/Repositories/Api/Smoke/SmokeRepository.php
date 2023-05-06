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

    public function store(array $request)
    {
        $this->smoke->query()->create([
            'brand_id' => $request['brand_id'],
            'user_id' => $request['user_id'],
        ]);
    }

    public function updateByIdBrandIdUserId(int $id, array $request)
    {
        // 該当レコード取得
        $query = $this->smoke->query();
        $query = $query->where('brand_id', $request['brand_id']);
        $query = $query->where('user_id', $request['user_id']);
        $query = $query->findOrFail($id);
        // 更新
        $query->update([
            'count' => $request['count'],
        ]);
    }
}
