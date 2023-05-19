<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Smoke\HistorySmokeRequest;
use App\Http\Requests\Api\Smoke\StoreSmokeRequest;
use App\Http\Requests\Api\Smoke\UpdateSmokeRequest;
use App\Repositories\Api\Smoke\SmokeRepositoryInterface;
use App\Services\Api\Smoke\SmokeServiceInterface;

class SmokeController extends Controller
{
    private $smokeRepository;
    private $smokeService;

    public function __construct(
        SmokeRepositoryInterface $smokeRepository,
        SmokeServiceInterface $smokeService
    ) {
        $this->smokeRepository = $smokeRepository;
        $this->smokeService = $smokeService;
    }

    public function history(HistorySmokeRequest $request)
    {
        return $this->smokeService->getHistories($request->all());
    }

    public function store(StoreSmokeRequest $request)
    {
        /**
         * @todo バリデーションでbrand_idからbrand_nameを加工しておくこと
         */
        $request = [
            'brand_id' => $request->brand_id,
            'user_id' => $request->user_id,
            'brand_name' => $request->brand_name,
        ];

        $this->smokeRepository->store($request);
    }

    public function update(UpdateSmokeRequest $request, $smokeId)
    {
        /**
         * @todo バリデーションでbrand_idからbrand_name, per_priceを加工しておく
         */
        $request = [
            'brand_id' => $request->brand_id,
            'user_id' => $request->user_id,
            'brand_name' => $request->brand_name ?? 'test',
            'count' => $request->count,
            'per_price' => $request->per_price ?? 26.5,
            'amount' => $request->amount ?? 26.5,
        ];

        $this->smokeRepository->updateByIdBrandIdUserId($smokeId, $request);
    }
}
