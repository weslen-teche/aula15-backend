<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'max:50'],
            'description' => ['required', 'max:100']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'O campo titulo é requerido.',
            'title.max' => 'O campo titulo só pode ter até :max caracteres.',
            'description.required' => 'O campo descrição é requerido.',
            'description.max' => 'O campo descrição só pode ter até :max caracteres.'
        ];
    }
}
