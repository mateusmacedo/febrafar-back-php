<?php

namespace App\Http\Requests;

use App\Rules\NotWeekend;
use Illuminate\Foundation\Http\FormRequest;

class ActivityStoreRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'nullable|string',
            'user_id' => 'required|exists:users,id',
            'start_date' => ['required', 'date', 'after_or_equal:today', new NotWeekend],
            'due_date' => ['required', 'date', 'after_or_equal:start_date', new NotWeekend],
            'completion_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'required|in:open,completed',
        ];
    }
}