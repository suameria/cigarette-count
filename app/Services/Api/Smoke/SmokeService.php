<?php

namespace App\Services\Api\Smoke;

use App\Repositories\Api\Smoke\SmokeRepositoryInterface;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class SmokeService implements SmokeServiceInterface
{
    private $smokeRepository;

    public function __construct(SmokeRepositoryInterface $smokeRepository)
    {
        $this->smokeRepository = $smokeRepository;
    }

    public function createHistories(array $request): array
    {
        // 喫煙本数履歴格納配列
        $histories = [
            'every' => null, // 日毎
            'total' => null, // 集計
        ];

        // 喫煙本数履歴取得
        $smokes = $this->smokeRepository->getHistoryByUserIdDate(
            $request['user_id'],
            $request['date_from'],
            $request['date_to']
        );

        // 日毎の配列
        $periods = CarbonPeriod::since($request['date_from'])->until($request['date_to']);

        foreach ($periods as $date) {
            // 日付で喫煙本数履歴を絞る
            $targetSmokes = $smokes->whereBetween('created_at', [
                Carbon::parse($date)->startOfDay(),
                Carbon::parse($date)->endOfDay()
            ]);

            // その日に喫煙した本数と金額
            foreach ($targetSmokes as $targetSmoke) {
                $histories['every'][$date->format('Y-m-d')][] = [
                    'id'         => $targetSmoke->id,
                    'brand_name' => $targetSmoke->brand_name,
                    'count'      => $targetSmoke->count,
                    'amount'     => $targetSmoke->amount,
                ];
            }
        }

        // 合計喫煙本数
        $histories['total']['count'] = $smokes->sum('count');
        // 合計金額
        $histories['total']['amount'] = $smokes->sum('amount');

        return $histories;
    }
}
