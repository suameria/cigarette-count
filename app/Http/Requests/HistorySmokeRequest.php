<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HistorySmokeRequest extends FormRequest
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

    /**
     * バリデーション完了後
     */
    protected function passedValidation()
    {
        $this->merge([
            'date_from' => now()->parse($this->date_from)->startOfDay()->toDateTimeString(),
            'date_to' => now()->parse($this->date_to)->endOfDay()->toDateTimeString(),
        ]);
    }
}
