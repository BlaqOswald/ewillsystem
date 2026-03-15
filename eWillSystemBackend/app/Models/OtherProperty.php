<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherProperty extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function ruser(){
        return $this->belongsTo(User::class, 'user_id','id');
    }
    // public function rdisposition(){
    //     return $this->belongsTo(PropertyDispositionDetail::class, 'id','property_id');
    //    }

    public function rdisposition()
    {
        return $this->hasMany(PropertyDispositionDetail::class, 'property_id', 'id');
    }
}
