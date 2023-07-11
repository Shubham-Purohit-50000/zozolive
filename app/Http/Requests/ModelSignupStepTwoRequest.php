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
            // 'pricing'       => 'required',
            'specific_id'   => 'required',
            'private_call'   => 'required',
            'ticket_show'   => 'required',
            'profile_image' => 'required|image',
            // 'cover_image'   => 'required|image'
        ];
    }

    public function messages()
    {
        return [
            'language_id.required'   => 'Field is required.',
            'subculture_id.required' => 'Field is required.',
            'specific_id.required'   => 'Field is required.',
            'interest.required'   => 'Field is required.',
            'about.required'   => 'Field is required.',
            // 'pricing.required'   => 'Field is required.',
            'profile_image'   => 'Field is required.',
            'private_call'   => 'Field is required.',
            'ticket_show'   => 'Field is required.',
        ];
    }
}
