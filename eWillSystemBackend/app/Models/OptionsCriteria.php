<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionsCriteria extends Model
{
    use HasFactory;

    protected $table = "options_criterias";
    protected $fillable = ["category", "value"];

    // You can exclude some attributes if necessary
    protected $auditExclude = ["updated_at"];
}
