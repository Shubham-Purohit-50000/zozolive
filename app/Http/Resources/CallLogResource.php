<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class CallLogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $commanData = [
            'uuid'          => $this->uuid,
            'start_time'    => $this->start_time ? Carbon::parse($this->start_time)->format('d-m-Y H:i:s') : NULL,
            'duration'      => $this->duration,
        ];
        if (isRole('user')) {
            $data = [
                'host_name'     => $this->host->name ?? NULL,
                'host_avatar'   => $this->host->avatar ? Storage::url($this->host->avatar) : NULL,
                'host_firebase_id' => $this->host->firebase_id ?? NULL,
                'host_is_active' => $this->host->is_active ?? NULL,
                'total_coin'    => ('-'. (int) $this->call_coin + (int) $this->gift_coin),
            ];
        } elseif (isRole('host')) {
            $data = [
                'user_name'     => $this->user->name ?? NULL,
                'user_user_id'  => $this->user->user_id ?? NULL,
                'user_avatar'   => $this->user->avatar ? Storage::url($this->user->avatar) : NULL,
                'user_firebase_id' => $this->user->firebase_id ?? NULL,
                'user_is_active' => $this->user->is_active ?? NULL,
                'total_coin'    => ('+' . (int) $this->call_coin + (int) $this->gift_coin),
            ];
        }
        return array_merge($data, $commanData);
    }
}
