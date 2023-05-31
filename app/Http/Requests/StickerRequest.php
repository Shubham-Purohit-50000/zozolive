<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StickerRequest extends FormRequest
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
            'price' => 'required',
            'image' => 'required_without:uuid'
        ];
    }
    public function validated_data()
    {
        $data = $this->validator->validated();
        if($this->image){
            $data['image'] = 'stickers/'.$this->image->hashName();
            $this->image->store('public/stickers');
        }
        return $data;
    }
}
