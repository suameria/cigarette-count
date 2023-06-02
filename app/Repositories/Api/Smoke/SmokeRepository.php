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

    public function findTodayByBrandIdUserId(int $brandId, int $userId): Smoke|null
    {
        return $this->smoke->query()
            ->where('brand_id', $brandId)
            ->where('user_id', $userId)
            ->whereBetween('created_at', [now()->startOfDay(), now()->endOfDay()])
            ->first();
    }

    public function getHistoryByDate(string $from, string $to): Collection
    {
        return $this->smoke->query()
            ->select([
                'id',
                'brand_name',
                'count',
                'amount',
                'created_at',
            ])
            ->where('user_id', 1)
            ->whereBetween('created_at', [$from, $to])
            ->get();
    }

    public function store(array $request): void
    {
        $data = [
            'brand_id'   => $request['brand_id'],
            'user_id'    => $request['user_id'],
            'brand_name' => $request['brand_name'],
            'count'      => 0,
            'per_price'  => 0,
            'amount'     => 0,
        ];

        $this->smoke->query()->create($data);
    }

    public function updateById(int $id, array $request): void
    {
        $data = [
            'brand_name' => $request['brand_name'],
            'count'      => $request['count'],
            'per_price'  => $request['per_price'],
            'amount'     => $request['amount'],
        ];

        $this->smoke->query()->findOrFail($id)->update($data);
    }
}
