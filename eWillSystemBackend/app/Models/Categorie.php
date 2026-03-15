<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function raddedby(){
        return $this->belongsTo(User::class, 'addedby','id');
    }
}
