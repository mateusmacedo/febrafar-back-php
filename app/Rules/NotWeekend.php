<?php

namespace App\Rules;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use Illuminate\Contracts\Validation\Rule;

class NotWeekend implements Rule
{
    public function passes($attribute, $value)
    {
        $dayOfWeek = Carbon::parse($value)->dayOfWeek;
        return !in_array($dayOfWeek, [CarbonInterface::SATURDAY, CarbonInterface::SUNDAY]);
    }

    public function message()
    {
        return 'The :attribute cannot be a weekend.';
    }
}
