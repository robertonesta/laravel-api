<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', Rule::unique('projects', 'title')->ignore($this->project), 'min:3', 'max:150'],
            'repo' => 'nullable',
            'date' => 'nullable',
            'Image' => [Rule::unique('projects', 'title')],
            'type_id' => ['exists:types,id', 'nullable'],
            'technologies' => ['exists:technologies,id', 'nullable'],
        ];
    }
    
    public function messages()
    {
        return [
            'title.required' => 'You must add a title!',
            'title.min' =>'The title must have at least 3 characters!',
            'title.max' => 'The length of the title must be less than 150 characters!',
        ];
    }
}
