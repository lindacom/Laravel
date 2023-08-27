<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
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
           /* 'customerid' => $this->customerid,
            'booktitle' => $this->booktitle,
            'description' => $this->description,
            'likes' => $this->likes,
            'customer' => $this->customer,
            'body' => $this->review,
            'star' => $this->star,
            'product_id' => $this->product_id,*/
        ];
    }
}