<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ImageDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        "email",
        "user_id",
        "file",
        "file_type",
        "title",
    ];
    // Optionally specify which attributes to include in audits
    protected $auditInclude = ["file", "file_type", "title"];

    // You can exclude some attributes if necessary
    protected $auditExclude = ["updated_at"];

    public function user()
    {
        return $this->BelongsTo(User::class, "user_id", "id");
    }
}
