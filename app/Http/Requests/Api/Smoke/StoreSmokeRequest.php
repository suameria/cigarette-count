<?php

namespace App\Http\Requests\Api\Smoke;

use App\Http\Requests\Api\ApiRequest;
use App\Repositories\Api\Brand\BrandRepositoryInterface;
use App\Repositories\Api\Smoke\SmokeRepositoryInterface;
use App\Rules\ExistTodaySmoke;

class StoreSmokeRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'user_id' => auth()->user()->id,
        ]);
    }

    public function rules(): array
    {
        $smokeRepository = app()->make(SmokeRepositoryInterface::class);
        // 本日の喫煙本数履歴検索
        $smoke = $smokeRepository->findTodayByBrandIdUserId($this->brand_id, $this->user_id);

        return [
            'brand_id' => ['required', new ExistTodaySmoke($smoke)],
        ];
    }

    protected function passedValidation(): void
    {
        $brandRepository = app()->make(BrandRepositoryInterface::class);
        // 銘柄検索
        $brand = $brandRepository->findByIdUserId($this->brand_id, $this->user_id);

        $this->merge([
            'brand_name' => $brand->name
        ]);
    }
}
