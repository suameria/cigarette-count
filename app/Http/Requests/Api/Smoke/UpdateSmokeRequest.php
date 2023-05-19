<?php

namespace App\Http\Requests\Api\Smoke;

use App\Http\Requests\Api\ApiRequest;

class UpdateSmokeRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            //
        ];
    }
}
