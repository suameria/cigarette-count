<?php

namespace App\Repositories\Api\Smoke;

use App\Models\Smoke;
use Illuminate\Database\Eloquent\Collection;

class SmokeRepository implements SmokeRepositoryInterface
{
    private $smoke;

    public function __construct(Smoke $smoke)
    {
        $this->smoke = $smoke;
    }

    /**
     * 喫煙本数履歴取得
     */
    public function getHistoryByDate(string $from, string $to): Collection
    {
        return $this->smoke->query()
            ->select([
                'brand_name',
                'count',
                'amount',
                'created_at',
            ])
            ->where('user_id', 1)
            ->whereBetween('created_at', [$from, $to])
            ->get();
    }

    /**
     * 保存
     */
    public function store(array $request)
    {
        $this->smoke->query()->create([
            'brand_id' => $request['brand_id'],
            'user_id' => $request['user_id'],
            'brand_name' => $request['brand_name'],
        ]);
    }

    /**
     * 喫煙本数履歴履歴ID、銘柄ID、ユーザーIDで喫煙本数の更新
     */
    public function updateByIdBrandIdUserId(int $id, array $request)
    {
        // 該当レコード取得
        $query = $this->smoke->query()
            ->where('brand_id', $request['brand_id'])
            ->where('user_id', $request['user_id'])
            ->findOrFail($id);
        // 更新
        $query->update([
            'brand_name' => $request['brand_name'],
            'count' => $request['count'],
            'per_price' => $request['per_price'],
            'amount' => $request['amount'],
        ]);
    }
}
