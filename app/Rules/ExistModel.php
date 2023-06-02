<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Database\Eloquent\Model;

class ExistModel implements ValidationRule
{
    private $model;
    private $errorMessage;

    public function __construct($model, string $errorMessage)
    {
        $this->model        = $model;
        $this->errorMessage = $errorMessage;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // 存在しなければエラーメッセージ
        if (empty($this->model) && !($this->model instanceof Model)) {
            $fail($this->errorMessage);
        }
    }
}
