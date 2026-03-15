<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function ruser(){
        return $this->belongsTo(User::class, 'user_id','id');
    }
    // public function rdisposition(){
    //     return $this->belongsTo(VehicleDisposition::class, 'id','property_id');
    //    }

    public function rdisposition()
    {
        return $this->hasMany(VehicleDisposition::class, 'property_id', 'id');
    }

}
