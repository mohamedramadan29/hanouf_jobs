<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobsname extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function Category()
    {
        return $this->belongsTo(JobCategory::class,'cat_id');
    }
}
