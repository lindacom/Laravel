<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
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
            'id' => $this->id,
            'customerId' => $this->customerId,
            'booktitle' => $this->booktitle,
            'description' => $this->description,
            'likes' => $this->likes,
            'customer' => $this->customer,
            'body' => $this->review,
            'star' => $this->star,
            'productId' => $this->productId,
        ];
    }
}