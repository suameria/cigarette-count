<?php

namespace App\Repositories\Api\BrandUser;

use App\Models\BrandUser;

class BrandUserRepository implements BrandUserRepositoryInterface
{
    private $brandUser;

    public function __construct(BrandUser $brandUser)
    {
        $this->brandUser = $brandUser;
    }

    public function getList()
    {
        return $this->brandUser->query()->get();
    }

    public function create(array $request)
    {
        $this->brandUser->query()->create([
            'brand_id' => $request['brand_id'],
            'user_id' => $request['user_id'],
        ]);
    }

    public function deleteByBrandIdUserId(int $brandId, int $userId)
    {
        // 検索
        $query = $this->brandUser->query();
        $query = $query->where('brand_id', $brandId);
        $query = $query->where('user_id', $userId);
        // 削除
        $query->delete();
    }
}
