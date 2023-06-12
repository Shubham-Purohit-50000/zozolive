<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokenSpent extends Model
{
    use HasFactory;

    protected $table='token_spent';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(Post::class, 'user_id', 'uuid');
    }  
}
