<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisment extends Model
{
    use HasFactory;

    protected $guarded = [];

    ///////////// Company Info
    ///
    public function company()
    {
        return $this->belongsTo(Company::class,'company_id');
    }
    ///////// Get the jobs Name
    ///
    public function jobs_names()
    {
        return $this->belongsTo(Jobsname::class,'job_name');
    }
    public function specialist()
    {
        return $this->belongsTo(Specialist::class,'profession_specialist');
    }
}
