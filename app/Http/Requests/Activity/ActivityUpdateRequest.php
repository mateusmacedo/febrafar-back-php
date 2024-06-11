<?php

namespace App\Http\Requests\Activity;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     schema="ActivityUpdateRequest",
 *     @OA\Property(
 *         property="title",
 *         type="string",
 *         description="The title of the activity",
 *         maxLength=255
 *     ),
 *     @OA\Property(
 *         property="type",
 *         type="string",
 *         description="The type of the activity",
 *         maxLength=255
 *     ),
 *     @OA\Property(
 *         property="description",
 *         type="string",
 *         description="The description of the activity"
 *     ),
 *     @OA\Property(
 *         property="start_date",
 *         type="string",
 *         format="date",
 *         description="The start date of the activity"
 *     ),
 *     @OA\Property(
 *         property="due_date",
 *         type="string",
 *         format="date",
 *         description="The due date of the activity"
 *     ),
 *     @OA\Property(
 *         property="completion_date",
 *         type="string",
 *         format="date",
 *         description="The completion date of the activity"
 *     ),
 *     @OA\Property(
 *         property="status",
 *         type="string",
 *         enum={"open", "completed"},
 *         description="The status of the activity"
 *     )
 * )
 */
class ActivityUpdateRequest extends FormRequest
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
            'title' => 'sometimes|required|string|max:255',
            'type' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'sometimes|required|date|after_or_equal:today',
            'due_date' => 'sometimes|required|date|after_or_equal:start_date',
            'completion_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'required|in:open,completed',
            'user_id' => 'exists:users,id',
        ];
    }
}
