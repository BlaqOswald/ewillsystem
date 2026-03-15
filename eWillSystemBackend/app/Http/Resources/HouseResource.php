<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HouseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id'=>$this->id,
            'type'=>$this->type,
            'category'=>$this->category,
            'block'=>$this->block,
            'plot'=>$this->plot,
            'file'=>$this->file,
            'location'=>$this->location,
            'custodian'=>$this->custodian,
            // 'disposition'=>$this->rdisposition,
            'disposition' => $this->rdisposition->map(function($disposition) {
                return [
                    'id' => $disposition->id,
                    'size' => $disposition->size,
                    'detail' => $disposition->detail,
                    'disposed_to' => $disposition->disposed_to,
                    // Add other disposition attributes as needed
                ];
            }),
           
        ];
    }
}
