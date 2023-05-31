<?php

namespace App\Http\Requests;

use App\Models\Agency;
use Illuminate\Foundation\Http\FormRequest;

class HostRequest extends FormRequest
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
            'name'          => 'required',
            'email'         => 'required|email|unique:users,email',
            'password'      => 'required|string|min:8',
            'dob'           => 'required',
            'agency_code'   => 'required|exists:agencies,code',
            'avatar'        => 'required',
            'gallery'       => 'required',
            'video'         => 'required',
            'firebase_id'   => 'required'
        ];
    }
    public function validated_data()
    {
        $data = $this->validator->validated();
        if($this->avatar){
            $data['avatar'] = 'user-avatars/'.$this->avatar->hashName();
            $this->avatar->store('public/user-avatars');
        }
        if($this->video){
            $data['video'] = 'host-video/'.$this->video->hashName();
            $this->video->store('public/host-video');
        }
        $data['password'] = bcrypt($this->password);
        $data['plain_password'] = $this->password;
        $data['is_active'] = 0;
        $data['user_id'] = generateUserId();
        $data['agency_id'] = Agency::where('code',$this->agency_code)->value('uuid');
        unset($data['agency_code']);
        return $data;
    }
}
