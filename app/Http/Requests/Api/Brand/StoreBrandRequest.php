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
            //
        ];
    }
}
