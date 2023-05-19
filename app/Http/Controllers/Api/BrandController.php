<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Brand\StoreBrandRequest;
use App\Http\Requests\Api\Brand\UpdateBrandRequest;
use App\Repositories\Api\Brand\BrandRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class BrandController extends Controller
{
    private $brandRepository;

    public function __construct(BrandRepositoryInterface $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    /**
     * 銘柄一覧
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $data = $this->brandRepository->getByUserId(auth()->user()->id)->toArray();
        return response()->success(Response::HTTP_OK, $data);
    }

    /**
     * 銘柄詳細
     *
     * @param  int $brandId
     * @return JsonResponse
     */
    public function show(int $brandId): JsonResponse
    {
        $data = $this->brandRepository->findByIdUserId($brandId, auth()->user()->id);
        return response()->success(Response::HTTP_OK, $data);
    }

    /**
     * 銘柄保存
     *
     * @param  StoreBrandRequest $request
     * @return JsonResponse
     */
    public function store(StoreBrandRequest $request): JsonResponse
    {
        $this->brandRepository->store($request->all());
        return response()->success(Response::HTTP_CREATED, null);
    }

    /**
     * 銘柄更新
     *
     * @param  UpdateBrandRequest $request
     * @param  int $brandId
     * @return JsonResponse
     */
    public function update(UpdateBrandRequest $request, int $brandId): JsonResponse
    {
        $this->brandRepository->updateByIdUserId($brandId, auth()->user()->id, $request->all());
        return response()->success(Response::HTTP_OK, null);
    }

    /**
     * 銘柄削除
     *
     * @param  int $brandId
     * @return JsonResponse
     */
    public function delete(int $brandId): JsonResponse
    {
        $this->brandRepository->deleteByIdUserId($brandId, auth()->user()->id);
        return response()->success(Response::HTTP_NO_CONTENT, null);
    }
}
