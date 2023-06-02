<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ExistTodaySmoke implements ValidationRule
{
    private $smoke;

    public function __construct($smoke)
    {
        $this->smoke = $smoke;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // 今日の喫煙本数履歴がすでに存在している
        if (!empty($this->smoke)) {
            $fail('There is already a history of the number of cigarettes smoked for today');
        }
    }
}
