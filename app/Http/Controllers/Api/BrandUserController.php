<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandUserRequest;
use App\Http\Requests\UpdateBrandUserRequest;
use App\Models\BrandUser;
use App\Repositories\Api\BrandUser\BrandUserRepositoryInterface;

class BrandUserController extends Controller
{
    private $brandUseerRepository;

    public function __construct(BrandUserRepositoryInterface $brandUseerRepository)
    {
        $this->brandUseerRepository = $brandUseerRepository;
    }

    public function index()
    {
        /**
         * @todo 返す値
         * brand_name
         * created_at
         */
        return $this->brandUseerRepository->getList();
    }

    public function store(StoreBrandUserRequest $request)
    {
        $request = [
            'brand_id' => $request->brand_id,
            'user_id' => $request->user_id,
        ];

        $this->brandUseerRepository->store($request);
    }

    public function destroy($brandId)
    {
        // @todo ユーザーID直打ち
        $this->brandUseerRepository->deleteByBrandIdUserId($brandId, 1);
    }
}
