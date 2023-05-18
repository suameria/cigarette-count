<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ExistEmail implements ValidationRule
{
    private $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // メールアドレスが存在しない
        // ユーザーには正しく入力するように促す
        if (empty($this->user)) {
            $fail('Please enter your e-mail address correctly');
        }
    }
}
