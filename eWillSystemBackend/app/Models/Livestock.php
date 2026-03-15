<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livestock extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function ruser(){
        return $this->belongsTo(User::class, 'user_id','id');
    }
    // public function rdisposition(){
    //     return $this->belongsTo(LivestockDisposition::class, 'id','property_id');
    //    }

    public function rdisposition()
    {
        return $this->hasMany(LivestockDisposition::class, 'property_id', 'id');
    }
}
