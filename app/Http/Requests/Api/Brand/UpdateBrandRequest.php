<?php

namespace App\Http\Requests\Api\Brand;

use App\Http\Requests\Api\ApiRequest;

class UpdateBrandRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // 保存と同じバリデーション
        return (new StoreBrandRequest())->rules();
    }
}
