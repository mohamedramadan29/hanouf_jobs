<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    protected $guarded = [];

    public function getLogo(){
        return asset('assets/uploads/setting/'.$this->logo);
    }
    public function getFavicon(){
        return asset('assets/uploads/setting/'.$this->favicon);
    }
}
