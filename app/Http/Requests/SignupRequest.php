<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
            'email'     => 'required|unique:users,email',
            'username'  => 'required|unique:users,username|regex:/^[a-zA-Z0-9_\-]+$/',
            'password'  => 'required|min:8'
        ];
    }

    /**
     * @return mixed
     */
    public function validatedAttribute()
    {
        $attributes = parent::validated();
        $attributes['name'] = $this->username;
        $attributes['password'] = bcrypt($this->password);
        return $attributes;
    }
}
