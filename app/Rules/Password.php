<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Hash;

class Password implements ValidationRule
{
    private $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // パスワードが間違っている
        if (Hash::check($value, $this->user->password) === false) {
            $fail('Wrong value');
        }
    }
}
