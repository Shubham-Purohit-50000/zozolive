<?php

namespace App\Models;

class OfficialMessage extends BaseModel
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'uuid');
    }
}
