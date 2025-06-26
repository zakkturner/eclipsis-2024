<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhotoRequest extends FormRequest
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
            'alt' => 'nullable|min:3|max:255',
            'img_src' => 'nullable|mimes:jpeg,jpg,png,gif',
            'position' => 'nullable|min:3|max:255',
            'active' => 'boolean|nullable'
        ];
    }
}
