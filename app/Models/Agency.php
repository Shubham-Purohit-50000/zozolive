<?php

namespace App\Models;

class Agency extends BaseModel
{
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','uuid');
    }
    /**
     * Get all of the host for the Agency
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function host()
    {
        return $this->hasMany(Host::class, 'agency_id', 'uuid');
    }
}
