<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
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
            'title' => 'required|max:255',
            'description' => 'string|nullable',
            'category_id' => 'required|integer|exists:categories,id',
            'project_id' => 'required|integer',
            'completed' => 'boolean',
            'priority' => 'string|in:high,medium,low',
            'due_date' => 'required|date|after:today|date_format:Y-m-d',

        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'The Task title is required.',
            'category_id.required' => 'The category is required.',
            'project_id.required' => 'The Project is required.',
            'status.required' => 'The task status is required.',
            'priority.required' => 'The Task priority is required.',
            'status.string' => 'The status must be a string.',
            'priority.string' => 'The priority must be a string.',
            'ends_at'.'date' => 'Task ending should be a date',
            'ends_at'.'after' => 'Task ending should be greater than the creation date',
        ];
    }
}
