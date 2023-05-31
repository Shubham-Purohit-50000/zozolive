<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GiftRequest extends FormRequest
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
            'image'     => 'required_without:uuid|image',
            'coin'      => 'required|numeric'
        ];
    }
    public function validated_data()
    {
        $data = $this->validator->validated();
        if($this->image){
            $data['image'] = 'gifts/'.$this->image->hashName();
            $this->image->store('public/gifts');
        }
        return $data;
    }
    public function messages()
    {
        return [
            'image.required_without' => 'The image field is required'
        ];          
    }
}
