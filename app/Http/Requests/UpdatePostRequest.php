<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'tags' => 'nullable|string|max:255',
            'category' => 'required',
            'text' => 'required|string|max:25000',
            'imageFile' => 'nullable',
            'imageString' => 'nullable|string'
        ];
    }
}