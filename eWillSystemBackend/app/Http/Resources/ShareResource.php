<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShareResource extends JsonResource
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
            'percentage'=>$this->percentage,
            'organisation'=>$this->organisation,
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
