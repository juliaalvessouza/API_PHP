<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PurchaseItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "item" => new ItemResource($this->item),  
            "quantity"=>$this->item_quantity,
            "price"=>$this->item_price,
            
        ];
    }
  
}