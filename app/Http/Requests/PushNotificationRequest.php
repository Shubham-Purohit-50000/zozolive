<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PushNotificationRequest extends FormRequest
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
            'schedule'      => 'nullable|in:0,1,2',
        ];
    }
    public function validated_data()
    {
        $data = $this->validator->validated();
        if($this->image){
            $data['image'] = 'push-notification/images/'.$this->image->hashName();
            $this->image->store('public/push-notification/images');
        }
        return $data;
    }
}
