<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentGatewayResource extends JsonResource
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
            'gateway_name'  => paymentGateways()[$this->payment_gateway_name] ?? '',
            'key'   => $this->payment_gateway_key,
            'secret'=> $this->payment_gateway_secret,
        ];
    }
}
