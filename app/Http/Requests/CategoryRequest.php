<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'icon'=>    'nullable',
        ];
    }
    public function validated_data()
    {
        $data = $this->validator->validated();
        $data['slug'] = Str::slug($this->title);
        if($this->icon){
            $data['icon'] = 'host/icon/'.$this->icon->hashName()??'';
            $this->icon->store('public/host/icon');
        }else{
            $data['icon']='';
        }
        return $data;
    }
}
