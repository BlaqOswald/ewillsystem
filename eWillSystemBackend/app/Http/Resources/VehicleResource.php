<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
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
            'name'=>$this->name,
            'number_plate'=>$this->number_plate,
            'model'=>$this->model,
            'color'=>$this->color,
            'type'=>$this->type,
            // 'disposition'=>$this->rdisposition,
            'disposition' => $this->rdisposition->map(function($disposition) {
                return [
                    'id' => $disposition->id,
                    'size' => $disposition->size,
                    'detail' => $disposition->detail,
                    'disposed_to' => $disposition->disposed_to,
                ];
            }),
            
    ];
                    
       
    }
}
