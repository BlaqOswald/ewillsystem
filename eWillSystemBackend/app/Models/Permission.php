<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    use HasFactory;

    protected $guarded = []; // You can specify fillable attributes instead, if needed.
    use HasFactory;
    public function rrole()
    {
        return $this->belongsTo(Role::class, "role", "id");
    }
    protected $fillable = ["user_id", "file", "file_type", "title"];
    // Specify attributes to include in the audits
    protected $auditInclude = ["question", "answer", "category"]; // Add any attributes you want to track for changes
    // Specify attributes to exclude from the audits
    protected $auditExclude = ["updated_at"];
}
