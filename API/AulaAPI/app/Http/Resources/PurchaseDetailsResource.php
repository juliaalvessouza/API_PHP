<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PurchaseItemResource;  


class PurchaseDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=>$this->id,
            "user_id"=>$this->user_id,
            "payment_type"=>$this->payment_type,
            "payment_status"=>$this->payment_status,
            "item"=> PurchaseItemResource::collection($this->items),                       
        ];
    }
  
}
