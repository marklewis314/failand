<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;

class Recaptcha implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret'),
            'response' => $value,
        ]);
        
        $result = $response->object();

        //dd($result);

        if (!$result->success) {
            $fail('Recaptcha failed - '. $result->{'error-codes'}[0]);
        }

        elseif ($result->score < 0.5) {
            $fail('Recaptcha failed - score: ' . $result->score);
        }
    }
}
