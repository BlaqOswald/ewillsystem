<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as SpatieRole;
use Spatie\Permission\Traits\HasRoles;

class Role extends SpatieRole
{
    use HasRoles;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = ["id", "name", "created_at", "updated_at"];

    // Optionally specify which attributes to include in audits
    protected $auditInclude = ["name", "updated_at"];

    // You can exclude some attributes if necessary
    protected $auditExclude = ["created_at"];
}
