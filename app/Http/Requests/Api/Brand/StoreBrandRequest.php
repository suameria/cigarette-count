<?php

namespace App\Http\Requests\Api\Brand;

use App\Http\Requests\Api\ApiRequest;

class StoreBrandRequest extends ApiRequest
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
        return [
            // 銘柄名
            'name' => ['required', 'string', 'max:255'],
            // 金額 1-10000までの数値許容
            'price' => ['required', 'integer', 'digits_between:1,5', 'min:1', 'max:10000'],
            // 本数 1-100までの数値許容
            'number' => ['required', 'integer', 'digits_between:1,3', 'min:1', 'max:100'],
        ];
    }
}
