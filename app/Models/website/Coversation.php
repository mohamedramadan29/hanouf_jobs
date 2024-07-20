<?php

namespace App\Models\website;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coversation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function Messages()
    {
        return $this->hasMany(Message::class, 'conversation_id');
    }
}
