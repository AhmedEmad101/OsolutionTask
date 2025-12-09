<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
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
            'title' => 'sometimes|max:255',
            'description' => 'sometimes|string|nullable',
            'category_id' => 'sometimes|integer|exists:categories,id',
            'project_id' => 'sometimes|integer',
            'priority' => 'sometimes|string|in:high,medium,low',
            'due_date' => 'sometimes|date|after:created_at|date_format:Y-m-d',
            'completed' => 'sometimes|boolean',
        ];
    }
}
