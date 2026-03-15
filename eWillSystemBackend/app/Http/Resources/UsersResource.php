<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UsersResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "subscription_name" => $this->subpackage
                ? $this->subpackage->name
                : "No Subscription",
            "username" => $this->username,
            "email" => $this->email,
            "last_name" => $this->last_name,
            "first_name" => $this->first_name,
            "original_address" => $this->original_address,
            "email" => $this->email,
            "telephone" => $this->contact,
            "willid" => $this->will_id,
            "nin" => $this->nin,
            "gender" => $this->gender,
            "date_of_birth" => $this->date_of_birth,
            "current_address" => $this->current_address,
            "marital_status" => $this->marital_status,
            "paystatus" => $this->paystatus,
            "created_at" => $this->created_at->format("d-m-Y"),
            "nationalID" => $this->nationalID, // Return just the file name
            "passport" => $this->passport,
            "relatives" => $this->rrelatives,
            "guardians" => $this->rguardian,
            "debtors" => $this->rdebtor,
            "creditors" => $this->rcreditor,
            "lands" => $this->rland,
            "houses" => $this->rhouse,
            "livestocks" => $this->rlivestock,
            "bankaccounts" => $this->rbankaccounts,
            "vehicles" => $this->rvehicle,
            "otherproperties" => $this->rotherproperty,
            "shares" => $this->rshare,
            "burialdetails" => $this->rburialdetails,
            "executors" => $this->rexecutors,
            "witnesses" => $this->rwitnesses,
        ];
    }
}
