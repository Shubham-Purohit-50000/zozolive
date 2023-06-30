<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModelSignupStepTwoRequest extends FormRequest
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
            'interest'      => 'required',
            'language_id'   => 'required',
            'subculture_id' => 'required',
            'about'         => 'required',
            'pricing'       => 'required',
            'specific_id'   => 'required',
            'profile_image' => 'required|image',
            // 'cover_image'   => 'required|image'
        ];
    }

    public function messages()
    {
        return [
            'language_id.required'   => 'The language field is required.',
            'subculture_id.required' => 'The subculture field is required.',
            'specific_id.required'   => 'The specific field is required.'
        ];
    }
}
