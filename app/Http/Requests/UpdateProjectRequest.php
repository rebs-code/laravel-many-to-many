<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
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
            //Unique rule checks if the name is unique in the projects table, but ignores the current project,
            // This is useful when updating a project, as you don't want to consider the current project's name as a duplicate.
            'name' => ['required', Rule::unique('projects')->ignore($this->project), 'max:255'],
            'description' => ['required', 'string', 'max:1000'],
            'tech_stack' => ['required', 'string', 'max:255'],
            'repo_link' => ['required', 'url'],
            'live_link' => ['url', 'nullable'],
            'image' => ['url', 'nullable'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('projects')->ignore($this->project)],
            //TYPE ID is nullable, but if it's not null, it must exist in the types table
            'type_id' => ['nullable', 'exists:types,id'],
        ];
    }
}
