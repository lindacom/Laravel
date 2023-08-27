<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductCollection extends JsonResource
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
            'id' => $this->productID,
            'bookTitle' => $this->bookTitle,
            //'image' => $this->image,
            'price' => $this->price,
          
                   //  'href' => [
              //  'link' => route('products.show',$this->id)
           // ]           
        ];
    }
}