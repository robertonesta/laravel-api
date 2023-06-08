<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTechnologyRequest extends FormRequest
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
            'name' => ['required', Rule::unique('technologies', 'name'), 'min:2', 'max:40']
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'You must add a name!',
            'name.min' =>'The name must have at least 3 characters!',
            'name.max' => 'The length of the name must be less than 150 characters!',
        ];
    }
}
