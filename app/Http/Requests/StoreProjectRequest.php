<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255', 'unique:projects,name'],
            'description' => ['required', 'string', 'max:1000'],
            'tech_stack' => ['required', 'string', 'max:255'],
            'repo_link' => ['required', 'url'],
            'live_link' => ['url', 'nullable'],
            'image' => ['url', 'nullable'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:projects,slug'],
            //TYPE ID is nullable, but if it's not null, it must exist in the types table
            'type_id' => ['nullable', 'exists:types,id'],
            //validate technology ids
            'technologies' => ['nullable', 'exists:technologies,id'],
        ];
    }
}
