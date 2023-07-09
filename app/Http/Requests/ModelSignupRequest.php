<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModelSignupRequest extends FormRequest
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
            'username'           => 'required',
            'interest'           => 'required',
            'language_id'        => 'required',
            'subculture_id'      => 'required',
            'about'              => 'required',
            'pricing'            => 'required',
            'specific_id'        => 'required',
            'profile_image'      => 'required|image',
            // 'cover_image'        => 'required|image',
            'name'               => 'required',
            'gender'             => 'required',
            // 'birth_date'         => 'required',
            // 'id_number'          => 'required',
            // 'address'            => 'required',
            // 'id_issuing_country' => 'required',
            'country_id'         => 'required',
            'state_id'           => 'required',
            'document'           => 'required|image',
            'id_photo'           => 'required|image'
        ];
    }

    public function messages()
    {
        return [
            'username.required'           => 'Field is required.',
            'interest.required'           => 'Field is required.',
            'language_id.required'        => 'Field is required.',
            'subculture_id.required'      => 'Field is required.',
            'about.required'              => 'Field is required.',
            'pricing.required'            => 'Field is required.',
            'specific_id.required'        => 'Field is required.',
            'profile_image.required'      => 'Field is required.',
            'name.required'               => 'Field is required.',
            'gender.required'             => 'Field is required.',
            'country_id.required'         => 'Field is required.',
            'state_id.required'           => 'Field is required.',
            'document'           => 'Field is required.',
            'id_photo'           => 'Field is required.'
        ];
    }
}
