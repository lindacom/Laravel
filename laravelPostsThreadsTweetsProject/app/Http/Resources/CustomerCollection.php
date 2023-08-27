<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            
            'customerName' => $this->customerName,
            'id' => $this->id,
            'DateOfBirth' => $this->DateOfBirth,
            'registered' => $this->registered,
            'Email' => $this->Email,
           // 'password' => $this->password,
           // 'href' => [
           //     'link' => route('order.show',$this->id)
           // ]
            
        ];
    }
}