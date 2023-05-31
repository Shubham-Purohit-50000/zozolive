<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = [
            'uuid'       => $this->uuid,
            'name'       => $this->name,
            'email'      => $this->email,
            'user_id'    => $this->user_id,
            'coin'       => $this->coin ?? 0,
            'firebase_id'=> $this->firebase_id,
        ];
        if($this->role->name == 'host'){
            $data['plain_password'] = $this->plain_password;
        }else{
            $data['is_free_call_used'] = $this->is_free_call_used;
        }
        return $data;
    }
}
