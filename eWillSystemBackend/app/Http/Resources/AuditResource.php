<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuditResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "activity" => $this->activity,
            "addedby" => $this->raddedby->username ?? "N/A",
            "addedon" => $this->created_at
                ? $this->created_at->format("Y-m-d H:i:s")
                : "N/A",
        ];
    }
}
