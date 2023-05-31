<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfficialMessageRequest extends FormRequest
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
            'title'         => 'required',
            'image'         => 'nullable|image',
            'description'   => 'nullable',
        ];
    }
    public function validated_data()
    {
        $data = $this->validator->validated();
        if(isset($this->image)){
            $data['image'] = 'official-messages/'.$this->image->hashName();
            $this->image->store('public/official-messages');
        }
        return $data;
    }
}
