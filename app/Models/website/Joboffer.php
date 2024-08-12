<?php

namespace App\Models\website;

use App\Models\admin\Advertisment;
use App\Models\admin\Jobsname;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joboffer extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function job()
    {
        return $this->belongsTo(Advertisment::class,'adv_id');
    }


}
