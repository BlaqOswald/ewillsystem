<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Relative extends Model
{
    // protected $guarded = [];
    protected $fillable = [
        "user_id",
        "name",
        "contact",
        "address",
        "gender",
        "date_of_birth",
        "life_status",
        "file",
        "type",
        "mariage",
    ];
    use HasFactory;
    public function ruser()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }
}
