<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        // Check if the request is for updating a user
        if ($this->isMethod('put') || $this->isMethod('patch')) {
            // Exclude the current user's ID from the unique validation rule
            return [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $this->user->id],
                'password' => ['nullable', 'string', 'min:8', 'confirmed'],
                'phone'=> ['nullable', 'numeric','unique:users,phone,' . $this->user->id],
                'address'=> ['nullable', 'string', 'max:255'],
                'balance' => ['nullable', 'numeric'],
            ];
        }
        // For creating a new user
        // Exclude the current user's ID from the unique validation rule
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone'=> ['nullable', 'string', 'max:15','unique:users,phone,except,id'],
            'address'=> ['nullable', 'string', 'max:255'],
            // Add any other validation rules as needed
        ];
    }
}
