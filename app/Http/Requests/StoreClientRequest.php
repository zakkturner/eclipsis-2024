<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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

            'company' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'website_url' => ['nullable', 'string', 'max:255'],
            'budget' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string', 'max:255'],
            'owner_birthday' => ['nullable', 'date'],
            'twitter' => ['nullable', 'string', 'max:255'],
            'linkedin' => ['nullable', 'string', 'max:255'],
            'instagram' => ['nullable', 'string', 'max:255'],
            'notes' => ['nullable', 'string'],
            'status' => ['nullable', 'string'],
            'is_active' => ['required', 'boolean'],
            'lead_source' => ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'company.required' => 'The company field is required.',
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
        ];
    }
}
