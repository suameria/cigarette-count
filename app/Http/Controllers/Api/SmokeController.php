<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Smoke\HistorySmokeRequest;
use App\Http\Requests\Api\Smoke\StoreSmokeRequest;
use App\Http\Requests\Api\Smoke\UpdateSmokeRequest;
use App\Repositories\Api\Smoke\SmokeRepositoryInterface;
use App\Services\Api\Smoke\SmokeServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class SmokeController extends Controller
{
    private $smokeRepository;
    private $smokeService;

    public function __construct(SmokeRepositoryInterface $smokeRepository, SmokeServiceInterface $smokeService)
    {
        $this->smokeRepository = $smokeRepository;
        $this->smokeService    = $smokeService;
    }

    /**
     * 喫煙本数履歴検索
     *
     * @param  HistorySmokeRequest $request
     * @return JsonResponse
     */
    public function history(HistorySmokeRequest $request): JsonResponse
    {
        $data = $this->smokeService->createHistories($request->all());
        return response()->success(Response::HTTP_OK, $data);
    }

    /**
     * 喫煙本数履歴保存
     *
     * @param  StoreSmokeRequest $request
     * @return JsonResponse
     */
    public function store(StoreSmokeRequest $request): JsonResponse
    {
        $this->smokeRepository->store($request->all());
        return response()->success(Response::HTTP_CREATED, null);
    }

    /**
     * 喫煙本数履歴更新
     *
     * @param  UpdateSmokeRequest $request
     * @param  int $smokeId
     * @return JsonResponse
     */
    public function update(UpdateSmokeRequest $request, int $smokeId): JsonResponse
    {
        $this->smokeRepository->updateById($smokeId, $request->all());
        return response()->success(Response::HTTP_OK, null);
    }
}
