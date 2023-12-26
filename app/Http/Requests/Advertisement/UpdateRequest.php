<?php

namespace App\Http\Requests\Advertisement;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => 'string',
            'description' => 'string',
            'price' => 'integer',
            'amenities' => 'array',
            'amenities.*' => 'string',
            'files' => 'nullable',
            'files.*' => 'nullable|mimes:jpeg,bmp,png,jpg|max:2048',
            'phone' => 'required|string|min:8|max:11'
        ];
    }
}
