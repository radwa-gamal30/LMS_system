<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnrollmentRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
            'paid' => 'nullable|numeric|min:0|nullable',
            'remaining' => 'nullable|numeric|min:0|nullable',
            'method' => 'nullable|string|max:50', // e.g., 'credit_card', 'paypal', 'bank_transfer'
        ];
    }
}
