<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CoinResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'uuid'  => $this->uuid,
            'type'  => packageType()[$this->type],
            'discount' => $this->discount,
            'price' => $this->amount,
            'coin'  => $this->coin,
            'payment_gateway' => 'razorpay' 
        ];
    }
}