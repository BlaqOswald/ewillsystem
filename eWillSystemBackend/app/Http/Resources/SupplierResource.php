<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SupplierResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'contact'=>$this->contact,
            'address'=>$this->address,
            'addedby'=>$this->raddedby->username ?? '',
            'addedon'=>$this->created_at->format('Y-m-d'),
        ];
    }
}
