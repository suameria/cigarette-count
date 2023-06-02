<?php

namespace App\Http\Requests\Api\Smoke;

use App\Http\Requests\Api\ApiRequest;

class HistorySmokeRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'date_from' => ['required', 'date', 'date_format:Y-m-d', 'before_or_equal:date_to'],
            'date_to'   => ['required', 'date', 'date_format:Y-m-d', 'after_or_equal:date_from'],
        ];
    }

    protected function passedValidation(): void
    {
        $this->merge([
            'user_id'   => auth()->user()->id,
            'date_from' => now()->parse($this->date_from)->startOfDay()->toDateTimeString(),
            'date_to'   => now()->parse($this->date_to)->endOfDay()->toDateTimeString(),
        ]);
    }
}
