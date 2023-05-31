<?php

namespace App\Http\Resources;

use Illuminate\Support\Facades\Storage;
use App\Http\Resources\HostGalleryResource;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class HostResource extends JsonResource
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
            'name'      => $this->name,
            'email'     => $this->email,
            'dob'       => $this->host->dob,
            'user_id'   => $this->user_id,
            'firebase_id'=> $this->firebase_id,
            'age'       => Carbon::parse($this->host->dob)->age,
            'agency_code'=> $this->host->agency->code ?? '',
            'avatar'    => $this->avatar ? Storage::url($this->avatar) : null,
            'video'     => $this->host->video ? Storage::url($this->host->video) : null,
            'gallery'   => HostGalleryResource::collection($this->host->gallery),
        ];
        if ($this->role->name == 'host') {
            $data['plain_password'] = $this->plain_password;
            return $data;
        }
        
        return $data;
    }
}
