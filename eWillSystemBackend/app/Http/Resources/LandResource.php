<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LandResource extends JsonResource
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
            'district'=>$this->district,
            'village'=>$this->village,
            'block'=>$this->block,
            'plot'=>$this->plot,
            'size'=>$this->size,
            'interest_type'=>$this->interest_type,
            'custodian'=>$this->custodian,
            'description'=>$this->description,
            'file' => $this->file ? asset('storage/' . $this->file) : null, //File path
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
