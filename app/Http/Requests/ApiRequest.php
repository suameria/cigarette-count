<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Http\Exceptions\HttpResponseException;

abstract class ApiRequest extends FormRequest
{
    protected function failedValidation(Validator $validator): void
    {
        $response = response()->error(
            Response::HTTP_UNPROCESSABLE_ENTITY,
            $validator->errors()->toArray()
        );

        throw new HttpResponseException($response);
    }
}
