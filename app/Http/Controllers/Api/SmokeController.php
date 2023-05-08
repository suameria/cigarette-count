<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\HistorySmokeRequest;
use App\Http\Requests\StoreSmokeRequest;
use App\Http\Requests\UpdateSmokeRequest;
use App\Models\Smoke;
use App\Repositories\Api\Smoke\SmokeRepositoryInterface;

class SmokeController extends Controller
{
    private $smokeRepository;

    public function __construct(SmokeRepositoryInterface $smokeRepository)
    {
        $this->smokeRepository = $smokeRepository;
    }

    public function history(HistorySmokeRequest $request)
    {
        /**
         * @todo バリデーションで下記の値がなければ
         * 本日の日付を入れるようにしておく
         */
        $request = $request->all();
        $dateFrom = now()->parse($request['date_from'])->startOfDay();
        $dateTo = now()->parse($request['date_to'])->endOfDay();

        return $this->smokeRepository->getHistoryByDate($dateFrom, $dateTo);
    }

    public function store(StoreSmokeRequest $request)
    {
        $request = [
            'brand_id' => $request->brand_id,
            'user_id' => $request->user_id,
        ];

        $this->smokeRepository->store($request);
    }

    public function update(UpdateSmokeRequest $request, $smokeId)
    {
        $request = [
            'brand_id' => $request->brand_id,
            'user_id' => $request->user_id,
            'count' => $request->count,
        ];

        $this->smokeRepository->updateByIdBrandIdUserId($smokeId, $request);
    }
}
