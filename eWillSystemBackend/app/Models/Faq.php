<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $guarded = []; // You can specify fillable attributes instead, if needed.

    // Specify attributes to include in the audits
    protected $auditInclude = [
        "question",
        "answer",
        "category", // Add any attributes you want to track for changes
    ];

    // Specify attributes to exclude from the audits
    protected $auditExclude = ["updated_at"];
}
