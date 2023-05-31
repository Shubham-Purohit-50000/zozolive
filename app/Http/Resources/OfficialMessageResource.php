<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class OfficialMessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $amount = $this->amount / 100;
        return [
            'uuid'          => $this->uuid,
            'amount'        => $amount,
            'status'        => $this->status,
            'order_id'      => $this->order_id,
            'payment_gateway' => $this->payment_gateway,
            'created_at'    => Carbon::parse($this->created_at)->format('Y-m-d H:i:s'),
            'user'          => $this->whenLoaded('user')
        ];
    }
}
