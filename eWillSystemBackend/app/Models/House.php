<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function ruser(){
        return $this->belongsTo(User::class, 'user_id','id');
    }  
    // public function rdisposition(){
    //     return $this->belongsTo(HouseDisposition::class, 'id','property_id');
    //    } 
    public function rdisposition()
    {
        return $this->hasMany(HouseDisposition::class, 'property_id', 'id');
    }
}
