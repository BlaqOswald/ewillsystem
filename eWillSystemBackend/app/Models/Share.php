<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function ruser(){
        return $this->belongsTo(User::class, 'user_id','id');
    }
    // public function rdisposition(){
    //     return $this->belongsTo(ShareDisposition::class, 'id','property_id');
    //    }

    public function rdisposition()
    {
        return $this->hasMany(ShareDisposition::class, 'property_id', 'id');
    }
}
