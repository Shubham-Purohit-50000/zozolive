<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class TermUseRequest extends FormRequest
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
            'title'     => 'required',
            'description'   => 'required',
            'order'   => 'required|numeric|digits_between:1,3',
            'status'=>    'nullable',
        ];
    }
    public function validated_data()
    {
        $data = $this->validator->validated();
        $data['status']='0';
        $data['slug']=Str::slug($this->title);
        return $data;
    }
}
