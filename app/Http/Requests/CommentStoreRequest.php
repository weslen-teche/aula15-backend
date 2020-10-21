<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentStoreRequest extends FormRequest
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
            'text' => ['required', 'max:250']
        ];
    }

    public function messages()
    {
        return [
            'text.required' => 'O campo comentário é requerido.',
            'text.max' => 'O campo comentário só pode ter até :max caracteres.'
        ];
    }
}
