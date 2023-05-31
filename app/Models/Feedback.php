<?php

namespace App\Models;

use App\Http\Traits\SetUserIdTrait;

class Feedback extends BaseModel
{
    use SetUserIdTrait;

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','uuid');
    }
}
