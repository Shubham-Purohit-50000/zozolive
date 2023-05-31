<?php

namespace App\Http\Requests;

use App\Models\{
    Role,
    User
};
use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
            'email'         => 'required|email',
            'password'      => 'required|string|min:8',
            'name'          => 'required|string',
            'avatar'        => 'nullable|image',
            'firebase_id'   => 'required',
            'device_id'     => 'required',
        ];
    }
    public function validated()
    {
        $data = parent::validated();
        if($this->password)
            $data['password'] = bcrypt($this->password);
        if(isset($this->image)){
            $data['image'] = $this->image;
        }
        $data['user_id'] = generateUserId();
        $data['name'] = $data['user_id'];
        $data['is_active'] = 1;
        $data['role_id'] = Role::where('name','user')->value('uuid');
        $data['is_free_call_used'] = User::where('device_id',$this->device_id)->value('is_free_call_used') == 1 ? 1 : 0;
        return $data;
    }
}
