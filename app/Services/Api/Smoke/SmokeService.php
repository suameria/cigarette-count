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

    public function getHistories(array $request): array
    {
        // 喫煙本数履歴格納配列
        $histories = [
            // 日毎
            'every' => null,
            // 集計
            'total' => null,
        ];

        // 喫煙本数履歴取得
        $smokes = $this->smokeRepository->getHistoryByDate(
            $request['date_from'],
            $request['date_to']
        );

        // 合計喫煙本数
        $histories['total']['count'] = $smokes->sum('count');
        // 合計金額
        $histories['total']['amount'] = $smokes->sum('amount');

        $periods = CarbonPeriod::since($request['date_from'])->until($request['date_to']);

        foreach ($periods as $date) {
            $targetSmokes = $smokes->whereBetween('created_at', [
                Carbon::parse($date)->startOfDay(),
                Carbon::parse($date)->endOfDay()
            ]);

            foreach ($targetSmokes as $targetSmoke) {
                $histories['every'][$date->format('Y-m-d')][] = [
                    'brand_name' => $targetSmoke->brand_name,
                    'count' => $targetSmoke->count,
                    'amount' => $targetSmoke->amount,
                ];
            }
        }

        return $histories;
    }
}
