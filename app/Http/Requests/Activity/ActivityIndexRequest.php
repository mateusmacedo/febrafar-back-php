<?php

namespace App\Http\Requests\Activity;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     schema="ActivityIndexRequest",
 *     required={"start_date", "end_date"},
 *     @OA\Property(
 *         property="start_date",
 *         type="string",
 *         format="date",
 *         description="The start date of the activity period",
 *         example="2024-01-01",
 *         default="2024-01-01"
 *     ),
 *     @OA\Property(
 *         property="end_date",
 *         type="string",
 *         format="date",
 *         description="The end date of the activity period",
 *         example="2024-12-31",
 *         default="2024-12-31"
 *     ),
 * )
 */
class ActivityIndexRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'start_date' => 'sometimes|required|date',
            'end_date' => 'sometimes|required|date|after_or_equal:start_date'
        ];
    }
}
