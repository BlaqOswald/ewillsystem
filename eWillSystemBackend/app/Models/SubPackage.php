<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "price",
        "description",
        "storage_limit",
        "support_level",
        "consultation_included",
    ];

    // Optionally specify which attributes to include in audits
    protected $auditInclude = ["file", "file_type", "title"];

    // You can exclude some attributes if necessary
    protected $auditExclude = ["updated_at"];

    public function ruser()
    {
        return $this->belongsTo(User::class, "user", "id");
    }
}
