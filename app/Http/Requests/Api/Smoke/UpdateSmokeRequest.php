<?php

namespace App\Http\Requests\Api\Smoke;

use App\Http\Requests\Api\ApiRequest;
use App\Repositories\Api\Smoke\SmokeRepositoryInterface;
use App\Rules\ExistModel;

class UpdateSmokeRequest extends ApiRequest
{
    private $smoke;

    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'smoke_id' => $this->route('smoke_id'),
            'user_id'  => auth()->user()->id,
        ]);
    }

    public function rules(): array
    {
        // 喫煙本数履歴存在確認
        $smokeRepository = app()->make(SmokeRepositoryInterface::class);
        // 喫煙本数履歴検索
        $this->smoke = $smokeRepository->findByIdUserId($this->smoke_id, $this->user_id);

        return [
            // 1000本までカウント許容
            'count' => [
                'required',
                'integer',
                'digits_between:1,4',
                'min:0',
                'max:1000',
            ],
            'smoke_id' => [
                // そのユーザーの喫煙本数履歴なのか検証
                new ExistModel($this->smoke, 'There is no your smoke history data'),
            ],
        ];
    }

    protected function passedValidation(): void
    {
        // 1本あたりの金額
        $perPrice = $this->smoke->brand->price / $this->smoke->brand->number;
        // 合計金額
        $amount = $perPrice * $this->count;

        $this->merge([
            'brand_name' => $this->smoke->brand->name,
            'per_price'  => $perPrice,
            'amount'     => $amount,
        ]);
    }
}
