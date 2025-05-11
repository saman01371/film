<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NationalCode implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // validateNationalCode($value);


        if ((validateNationalCode($value)) == 0) {
            $fail('کدملی معتبر نمیباشد');
        }

    }

    public function message()
    {
        return 'کدملی معتبر نمیباشد';
    }
}
