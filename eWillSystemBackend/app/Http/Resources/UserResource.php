<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    
    public function toArray($request)
    {
        return [
            'username'=>$this->username,
            'email'=>$this->email,
            'last_name'=>$this->last_name,
            'first_name'=>$this->first_name,             
            'telephone'=>$this->contact,
            'email'=>$this->email,
            'nin'=>$this->nin,
            'gender'=>$this->gender,
            'date_of_birth'=>$this->date_of_birth,
            'original_address'=>$this->original_address,
            'current_address'=>$this->current_address,
            'marital_status'=>$this->marital_status,
            'paystatus'=>$this->paystatus,
            'will_id'=>$this->will_id,
            'nationalID' => $this->nationalID, // Return just the file name
            'passport' => $this->passport,
            'created_at'=>$this->created_at->format('d-m-Y'),
        ];
    }
}
